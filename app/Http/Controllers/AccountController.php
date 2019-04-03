<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function logout()
    {
        Auth::user()->tokens->each(function($token, $key){
            $token->delete();
        });
        return response()->json('Token deleted');
    }
}
