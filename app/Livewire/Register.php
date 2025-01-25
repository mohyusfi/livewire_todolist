<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class Register extends Component
{
    public string $name;
    public string $email;
    public string $password;
    public string $password_confirmation;

    public function save()
    {
        $validated = $this->validate([
            "name" => "required|string|max:50",
            "email" => "required|email|max:50",
            "password" => "required|min:7|max:10|confirmed"
        ]);

        if ($validated) {
            User::create($validated);
            return response()->redirectTo("/login");
        }

        return false;
    }
    public function render()
    {
        return view('livewire.register');
    }
}
