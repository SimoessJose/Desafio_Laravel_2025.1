<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Models\Admin;
use App\Models\User;
class ContactController extends Controller
{
    public function index(User $user){

        return view('admin.contact', compact('user'));
    }

    public function store(Request $request, User $user){
        
        $recipient = User::find($user->id);
        
        $data = [
            'fromName' => logged_admin()->name,
            'fromEmail' => logged_admin()->email,
            'subject' => $request->input('subject'),
            'message' => $request->input('message')

        ];

        Mail::to($recipient->email,$recipient->name)->send(new Contact($data));

        return redirect()->back();
    }
}
