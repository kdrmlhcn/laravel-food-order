<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $contact                = new Contact();
        $contact->name          = $request->name;
        $contact->email         = $request->email;
        $contact->subject       = $request->subject;
        $contact->message       = $request->message;
        $contact->save();

        return redirect()->route('frontend.contact')->with('status','Mesajınız bize ulaştı.');
    }
}
