<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public string $email;
    public string $password;

    public function login(): RedirectResponse|bool
    {
        $validated = $this->validate([
            "email" => "email|required|string",
            "password" => "required|string|min:7|max:10"
        ]);

        if (Auth::attempt($validated)) {
            Session::put("users", $validated);
            return response()->redirectToIntended('/users');
        }

        return false;
    }
    public function render()
    {
        return view('livewire.login');
    }
}
