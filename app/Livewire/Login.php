<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public string $email;
    public string $password;

    public function login(): RedirectResponse|bool|Redirector
    {
        $validated = $this->validate([
            "email" => "email|required|string",
            "password" => "required|string|min:7|max:10"
        ]);

        if (Auth::attempt($validated)) {
            return redirect("/");
        }

        $this->addError("failed", "ensure password/email is correct");

        return false;
    }
    public function render()
    {
        return view('livewire.login');
    }
}
