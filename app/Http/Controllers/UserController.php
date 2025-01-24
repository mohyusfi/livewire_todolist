<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser(): View
    {
        $users = User::all();
        
        return view("Home.users", [
            "title" => "list User",
            "users" => $users->all()
        ]);
    }
}
