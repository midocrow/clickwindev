<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserFormController extends Controller
{
    //this function is for submiting the form and sending an email
    public function submit(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to(env('MAIL_USERNAME', 'hello@example.com'))->send(new WelcomeMail($request->name, $request->email, $request->message));

        return redirect('contact')->with('sent', true);
    }
}