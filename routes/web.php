<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!!
|
*/

Route::get('/setlocale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::get('/reset', function () {
    return view('auth.passwords.reset');
});

Route::get('/ran', function () {
    return Auth::routes();
});

Route::post('/changePassword', 'HomeController@changePassword')->name('changePassword');

Route::get('mail', function () {
    return view('vendor.mail.html.message');
});

Route::get('/date', 'WebScraper@date');



Auth::routes();

Route::get('/', 'WebScraper@landing');



Route::get('/contact', function () {
    return view('contact');
});



Route::get('/ads', function () {
    return view('ads');
});

Route::get('/adver', function () {
    return view('adver');
});



Route::middleware(['auth'])->group(function () {
    Route::post('/img', 'ProfileController@updateImage');

    Route::get('/watch', 'WebScraper@watch');

    Route::get('/watch', 'WebScraper@watch');

    Route::get('/change', function () {
        return view('auth.passwords.change');
    });

    Route::get('/settings', 'HomeController@settings');

    Route::get('/free', function () {
        return view('free');
    });

    Route::get('/coupon', function () {
        return view('coupon');
    });


    Route::get('/link', function () {
        return view('link');
    });

    Route::get('/store', function () {
        return view('store');
    });

    Route::get('/getlink', 'WebScraper@getlink');
    Route::get('/load', 'WebScraper@load');
    Route::get('/get', 'WebScraper@scrap');
    Route::post('/check', 'WebScraper@check');
    Route::get('/loadpoints', 'WebScraper@loadpoints');
    Route::get('/generatecode', 'WebScraper@generatecode');
    Route::post('/addlink', 'WebScraper@addlink');
    Route::post('/skiplink', 'WebScraper@skiplink');
    Route::get('/gettopten', 'WebScraper@gettopten');
    Route::get('/{any}', 'HomeController@index')->where('any', 'home||form||about||covid');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/getgoldlink', 'WebScraper@getgoldlink');
    Route::get('/getgoldcode', 'WebScraper@getgoldcode');
    Route::post('/checkgoldlink', 'WebScraper@checkgoldlink');
    Route::get('/profile', 'ProfileController@index');
    Route::get('/redirect/{value}', function ($value) {
        return redirect(Crypt::decryptString($value));
    });
});

Route::post('/sendContactMail', 'UserFormController@submit');