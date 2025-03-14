<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    const ITEMS_PER_PAGE = 6;
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

    public function withdraw(User $user, Request $request)
    {
        $data = $request->validate([
            'balance' => 'required|numeric',
        ]);
        
        
        if ($user->balance < $data['balance']) {
            return back()->withErrors(['balance' => 'Insufficient balance for withdrawal.']);
        }

    
        $user->balance -= $data['balance'];
        $user->save();
    

        return redirect()->route('withdrawView', $user->id);
    }

    public function withdrawView(User $user)
    {
        return view('user.withdraw', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $data = $request->except('image');


        $user->update($data);

        if ($request->hasFile('image')) {

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $imagePath = $request->file('image')->store('profiles', 'public');

            $user->image = $imagePath;
            $user->save();
        }

        return redirect()->route('editProfile', $user->id);
    }

    public function viewCreateProfile()
    {
        return view('admin.createProfile');
    }

    public function store(Request $request) 
{
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profiles', 'public');
    } else {
        $imagePath = null;
    }
    
    User::create([
        'name'       => $request->name,
        'email'      => $request->email,
        'date_birth' => $request->date_birth,
        'password'   => Hash::make($request->password),
        'address'    => $request->address,
        'number'     => $request->number,
        'cpf'        => $request->cpf,
        'balance'    => $request->balance,
        'image'      => $imagePath,
        'admin_id'   => logged_admin()->id,
    ]);
    
    return redirect()->route('createProfile');
}

public function registerUser(Request $request)
{
    $validatedData = $request->validate([
        'name'       => 'required|string|max:255',
        'email'      => 'required|string|email|max:255|unique:users',
        'date_birth' => 'required|date',
        'password'   => 'required|string',
        'address'    => 'nullable|string|max:255',
        'number'     => 'required|string|max:15|unique:users,number',
        'cpf'        => 'required|string|max:14|unique:users,cpf',
        'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profiles', 'public');
    } else {
        $imagePath = null;
    }

    $user = User::create([
        'name'       => $validatedData['name'],
        'email'      => $validatedData['email'],
        'date_birth' => $validatedData['date_birth'],
        'password'   => Hash::make($validatedData['password']),
        'address'    => $validatedData['address'] ?? null,
        'number'     => $validatedData['number'],
        'cpf'        => $validatedData['cpf'],
        'image'      => $imagePath,
        'admin_id'   => 1,
    ]);

    Auth::login($user);

    return redirect()->route('index');
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
