<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $request->user();
            $sucess['token'] = $user->createToken('Personal Access Token')->plainTextToken();
            $sucess['name'] = $user->name;
            $response = [
                'success' =>  true,
                'data' =>  $sucess,
            ];
        }
    }
}
