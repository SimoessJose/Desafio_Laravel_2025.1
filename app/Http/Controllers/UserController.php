<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function viewCreateProfile()
    {
        return view('admin.createProfile');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'date_birth' => $request->date_birth,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'number' => $request->number,
            'cpf' => $request->cpf,
            'balance' => $request->balance,
            'image' => $request->image,
            'admin_id' => logged_admin()->id,
        ]);
        return redirect()->route('createProfile');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

}
