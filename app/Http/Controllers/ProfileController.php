<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MenaraSolutions\Geographer\Earth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //

    public function index(Request $request)
    {
        $earth = new Earth();
        $cs = $earth->getCountries()->toArray();
        $countrie = $earth->getCountries()->findOne(['name' => $request->c ?? 'Afghanistan']);
        $cities = $countrie->getStates()->toArray();

        return view('profile', ['cities' => $cities, 'cs' => $cs]);
    }

    public function updateImage(Request $request)
    {
        $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048']);
        $image = $request->file('image');
        $dest = public_path('/storage/users');
        $input['name'] = str_replace(' ', '', Auth::user()->name) . time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->resize(256, 256);
        $img->save($dest . '/' . $input['name']);

        DB::table('users')
            ->updateOrInsert(
                ['id' => Auth::id()],
                ['avatar' => 'users/' . $input['name']]
            );
        //dd($input['name']);


        return back();
    }
}