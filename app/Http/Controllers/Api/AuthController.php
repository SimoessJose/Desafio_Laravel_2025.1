<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    const ITEMS_PER_PAGE = 6;

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string'
    //     ]);

    //     if(Auth::attempt($credentials)) {
            
    //         $token = $request->user()->createToken('token-name')->plainTextToken;
            
    //         return response()->json([
    //             'user' => new UserResource($request->user()), 
    //             'token' => $token,
    //             'status' => '200'
    //         ]);
    //     }

    //     return response()->json([
    //         'message' => 'Unauthorized',
    //         'status' => '205'
    //     ]);
       
    // }

    // public function showUser()
    // {
    //     $page = $_GET['page'];
    //     $skip = ($page - 1) * UserResource::ITEMS_PER_PAGE;
    //     $total_pages = ceil(    User::count() / UserController::ITEMS_PER_PAGE);
        
    //     $users = User::get()->skip($skip)->take(UserController::ITEMS_PER_PAGE);

    //     if($users){
    //         return response()->json([
    //             'users' => $users,
    //             'total_pages' => $total_pages,
    //             'status' => 200
    //         ]);
    //     }
    // }
}
