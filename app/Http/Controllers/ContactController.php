<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostAddMessageRequest;
use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getAdd()
    {
        return view('add');
    }

    public function postAdd(PostAddMessageRequest $request)
    {
        Message::create($request->validated());

        Mail::to($request->get('email'))->send(new ContactMail(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email'),
            $request->get('content')
        ));

        return redirect()->route('contact.index')
            ->with('success','Merci, votre message a bien été envoyé !');
    }
}
