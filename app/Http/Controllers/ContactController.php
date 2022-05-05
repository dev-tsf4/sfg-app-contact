<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostAddMessageRequest;
use App\Models\Message;

class ContactController extends Controller
{
    public function getAdd()
    {
        return view('add');
    }

    public function postAdd(PostAddMessageRequest $request)
    {
        Message::create($request->all());

        return redirect()->route('contact.index')
            ->with('success','Merci, votre message a bien été envoyé !');
    }
}
