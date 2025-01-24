<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{
    public $result;
    public string $input;

    public function mount(): void
    {
        $this->result = User::all();
    }
    public function updatedInput($input): void
    {
        if (!empty(trim($input))) {
            $searchValue = trim($input);
            $users = User::where("name", "LIKE", "%$searchValue%")
                            ->orWhere("email", "LIKE", "%$searchValue%")
                            ->orWhere("password", "LIKE", "%$searchValue%")
                            ->orderBy("id", "asc")
                            ->get();
            $this->result = isset($users[0]->name) ? $users : [];
        } else {
            $this->result = User::all();
        }
    }

    public function render()
    {
        return view('livewire.show-user');
    }
}
