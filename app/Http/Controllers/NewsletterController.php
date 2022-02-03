<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter = new Newsletter;
            $newsletter->subscribe(request('email'));
            
        } catch(Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'this email could not be added to our newletter list'
            ]);
        }
        
    return redirect('/')->with('success', 'You are now subscribed');
    }
}
