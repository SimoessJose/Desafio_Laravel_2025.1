<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.userTable', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.updateProfile', compact('user'));
    }

    public function view(User $user)
    {       
        return view('admin.viewProfile', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $data =$request->all();
        $user->update($data);
        $user->save();
        
         return redirect()->route('editProfile', $user->id);

    }
}
