<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(): View
    {
        return view("Auth.register");
    }

    public function login(): View
    {
        return view("Auth.login");
    }
}
