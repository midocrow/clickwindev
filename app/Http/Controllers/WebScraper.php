<?php

namespace App\Http\Controllers;

use App\Link;
use App\Notifications\PointsPaid;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use MenaraSolutions\Geographer\Earth;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class WebScraper extends Controller
{


    public function date()
    {
        // select timediff(addtime(updated_at,'24:00:00'),updated_at) from links limit 5;

        /*
        Auth::id();

        $link = DB::table('links')
            ->where('user_id', '=', Auth::id())
            ->select('updated_at')->get();

        $up_date = $link[0]->updated_at;

        //Carbon::now()->addDay();
        $mydate = Carbon::createFromFormat('Y-m-d H:i:s', $up_date);
        $diff= $mydate->diffInHours(Carbon::now());

        /*
        $links = DB::table('links')
            ->whereRaw("timediff(addtime(links.updated_at,'24:00:00'),now()) > 0")
            ->select('updated_at', 'user_id')->get();*/

        $earth = new Earth();
        $countries = $earth->getCountries()->toArray();
        $countrie = $earth->getCountries()->findOne(['name' => 'Australia']);
        //$countrie->getStates()->toArray()
        return response()->json(substr('clik.326724.win', 5, -4), 200);
    }

    public function loadpoints()
    {

        $points = DB::table('points')
            ->where('user_id', Auth::id())
            ->select('points')->get();

        return response()->json($points, 200);
    }

    public function getlink()
    {
        Auth::id();

        $link = DB::table('links')
            ->where('user_id', '=', Auth::id())
            ->get();

        return response()->json($link, 200);
    }

    public function gettopten()
    {
        $topusers = DB::table('users')
            ->orderBy('points', 'desc')
            ->join('points', 'users.id', '=', 'points.user_id')
            ->select('points.points', 'users.name')
            ->limit(10)->get();
        return response()->json($topusers, 200);
    }

    public function check(Request $request)
    {
        $link = DB::table('links')
            ->where('link', '=', $request->link)
            ->get();

        if (substr($link[0]->code, 6, -4) == $request->code) {

            $affected = DB::table('points')
                ->where('user_id', Auth::id())
                ->increment('points', $request->zone == 'red' ? 10 : ($request->zone == 'green' ? 1 : 15));

            $affected = DB::table('points')
                ->where('user_id', Auth::id())
                ->increment('position_' . $request->zone, 1);

            //Notification::send(Auth::user(), new PointsPaid($request));
            return response()->json($link, 200);
        }

        return sizeof($link) == 0 ? response()->json([], 422) : response()->json([], 200);
    }

    public function load(Request $request)
    {
        $positions = DB::table('points')
            ->where('user_id', Auth::id())
            ->select('position_' . $request->zone . ' as position')->take(1)->get();


        $position = $positions[0]->position;


        $link = DB::table('links')
            //->whereRaw("timediff(addtime(links.updated_at,'24:00:00'),now()) > 0")
            ->where('links.zone', $request->zone)
            ->join('points', 'links.user_id', '=', 'points.user_id')
            ->join('users', 'links.user_id', '=', 'users.id')
            ->orderBy('points', 'desc')
            ->skip($position)->take(1)->select('link', 'name', 'code')->get();

        return response()->json([$link->shift(), $position], 200);
    }

    public function generatecode()
    {
        return response()->json('clik.' . rand(100000, 999999) . '.win', 200);
    }

    public function skiplink(Request $request)
    {
        $affected = DB::table('points')
            ->where('user_id', Auth::id())
            ->increment('position_' . $request->zone, 1);
        return response()->json(null, 200);
    }

    public function addlink(Request $request)
    {
        if (filter_var($request->link, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {

            if (strpos($request->link, 'twitter.com')) {

                if (Auth::user()->link->link != $request->link) {
                    DB::table('links')
                        ->updateOrInsert(
                            ['user_id' => Auth::id()],
                            ['link' => $request->link, 'code' => $request->code, 'updated_at' => now()]
                        );

                    return response()->json("updated
                    ", 200);
                }
            }
        }

        return response()->json("no", 422);
    }

    public function getgoldlink(Request $request)
    {
        $positions = DB::table('points')
            ->where('user_id', Auth::id())
            ->select('position_gold' . ' as position')->take(1)->get();


        $position = $positions[0]->position;


        $link = DB::table('links')
            ->where('links.zone', 'gold')
            ->skip($position)->take(1)->get();

        //$link  = Crypt::encryptString($link->shift()->link);

        return response()->json($link->shift()->link, 200);
    }

    public function getgoldcode(Request $request)
    {
        $positions = DB::table('points')
            ->where('user_id', Auth::id())
            ->select('position_gold' . ' as position')->take(1)->get();


        $position = $positions[0]->position;


        $link = DB::table('links')
            ->where('links.zone', 'gold')
            ->skip($position)->take(1)->get();

        //$link  = Crypt::encryptString($link->shift()->link);

        return response()->json($link->shift()->code, 200);
    }

    public function checkgoldlink(Request $request)
    {

        $positions = DB::table('points')
            ->where('user_id', Auth::id())
            ->select('position_gold' . ' as position')->take(1)->get();


        $position = $positions[0]->position;


        $link = DB::table('links')
            ->where('links.zone', 'gold')
            ->skip($position)->take(1)->get();


        if ($link[0]->code == $request->code) {

            $affected = DB::table('points')
                ->where('user_id', Auth::id())
                ->increment('points', 20);

            $affected = DB::table('points')
                ->where('user_id', Auth::id())
                ->increment('position_gold', 1);



            return response()->json('ok', 200);
        }

        return response()->json('no', 422);
    }

    public function watch(Request $request)
    {
        return view('watch')->with('link', $request->link);
    }
}