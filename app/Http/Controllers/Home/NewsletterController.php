<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Newsletter;

class NewsletterController extends Controller
{
    public function thankyou()
    {
        return view('thankyou');
    }
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect('thank-you')->with('success', 'Thanks For Subscribing');
        }
        return redirect()->back()->with('failure', 'Sorry! You are already subscribed');
    }
}
