<?php

namespace App\Livewire;

use App\Models\Todolist;
use App\Services\TodolistService;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TodolistLivewire extends Component
{
    use WithPagination, WithoutUrlPagination;
    // protected $paginationTheme = 'bootstrap';
    public string $id;
    public string $todo;
    public function addTodo(TodolistService $todolistService): void
    {
        $result = $this->validate([
            "todo" => "required|string"
        ]);

        $isSuccess = $todolistService->create($result['todo'], Auth::id());

        if (!$isSuccess) {
            Session::flash("success", "Gagal add todo");
        } else {
            Session::flash("success", "Success add todo");
        }

    }
    public function delete(int $id, TodolistService $todolistService)
    {
        if ($id !== null) {
            $todo = Todolist::find($id);
            if ($todo->id) {
                $todolistService->delete($id);
            }
        }
    }

    public function render()
    {
        return view('livewire.todolist-livewire', [
            "todolistss" => Todolist::paginate(5)
        ]);
    }
}
