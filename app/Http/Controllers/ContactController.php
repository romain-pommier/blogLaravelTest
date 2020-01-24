<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function sendMail(ContactRequest $request)
    {
        Mail::to('administrateur@chezmoi.com')
            ->send(new Contact($request->except('_token')));

        return view('confirm');
    }
}
