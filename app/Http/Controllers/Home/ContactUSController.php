<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use Mail;

class ContactUSController extends Controller
{
    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        ContactUs::create($request->all());
        Mail::send('email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
        {
            $message->from('saquib.gt@gmail.com');
            $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Someone Messag You!');
        });
        return back()->with('success', 'Thanks for contacting us!');
    }
}
