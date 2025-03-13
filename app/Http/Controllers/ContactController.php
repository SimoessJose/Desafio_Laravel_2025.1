<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Models\User;
class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact');
    }

    public function store(Request $request){
        $data = [
            'fromName' => $request->input('name'),
            'fromEmail' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')

        ];

        $sent = Mail::to('brunoagjf@gmail.com','Bruno')->send(new Contact($data));

        return redirect()->back();
    }
}
