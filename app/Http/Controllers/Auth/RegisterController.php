<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login?success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20', 'unique:users', 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $referrer = User::whereName(session()->get('referrer'))->first();

        $password = Str::random(10);

        $user = User::create([
            'name' =>  str_replace(' ', '', $data['name']),
            'email' => $data['email'],
            'password' => Hash::make($password),
            'referrer_id' => $referrer ? $referrer->id : null,
        ]);

        Mail::to($data['email'])->send(new WelcomeMail($password, '', ''));

        return $user;
    }


    protected function registered(Request $request, $user)
    {
        //

        DB::table('links')
            ->updateOrInsert(
                ['zone' => 'blue', 'user_id' => $user->id, 'created_at' => Carbon::now()->addHour(), 'updated_at' => Carbon::now()->addHour()]
            );

        DB::table('points')
            ->updateOrInsert(
                ['points' => 0, 'user_id' => $user->id, "position_red" => 0, "position_blue" => 0, "position_green" => 0, "position_gold" => 0]
            );

        $referrer = User::whereName(session()->pull('referrer'))->first();

        if ($referrer) {
            $affected = DB::table('points')
                ->where('user_id', $referrer->id)
                ->increment('points', 30);
        }

        Auth::logout();
    }
}