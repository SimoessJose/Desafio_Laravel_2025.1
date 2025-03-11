<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    public function index()
    {

        $admin = Auth::guard('admin')->user();


        $admins = Admin::where('admin_id', $admin->id)->paginate(10);


        return view('admin.adminTable', compact('admins'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.updateAdminProfile', compact('admin'));
    }

    public function view(Admin $admin)
    {
        return view('admin.viewAdminProfile', compact('admin'));
    }

    public function update(Admin $admin, Request $request)
    {
        $data = $request->except('image');


        $admin->update($data);

        if ($request->hasFile('image')) {

            if ($admin->image) {
                Storage::disk('public')->delete($admin->image);
            }

            $imagePath = $request->file('image')->store('profiles', 'public');

            $admin->image = $imagePath;
            $admin->save();
        }

        return redirect()->route('editAdminProfile', $admin->id);
    }

    public function viewCreateProfile()
    {
        return view('admin.createAdminProfile');
    }

    public function store(Request $request) 
{
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profiles', 'public');
    } else {
        $imagePath = null;
    }
    
    Admin::create([
        'name'       => $request->name,
        'email'      => $request->email,
        'date_birth' => $request->date_birth,
        'password'   => Hash::make($request->password),
        'address'    => $request->address,
        'number'     => $request->number,
        'cpf'        => $request->cpf,
        'image'      => $imagePath,
        'admin_id'   => logged_admin()->id,
    ]);
    
    return redirect()->route('createProfile');
}

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->back();
    }
}
