<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index()
    {

        $admin = Auth::guard('admin')->user();


        $admins = Admin::where('admin_id', $admin->id)->paginate(4);


        return view('admin.adminTable', compact('admins'));
    }
}
