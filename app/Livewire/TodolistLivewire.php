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
    public int $id;
    public array $updateId = [];
    public string $todo;
    public string $newTodo;
    public string $input = '';
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

        $this->reset("todo");

    }

    public function updateTodo(TodolistService $todolistService): void
    {
        $result = $this->validate([
            "updateId" => "required|min:1|max:5",
            "newTodo" => "required|string"
        ]);

        $update = $todolistService->update($result["newTodo"], $result["updateId"]);

        if (!$update) {
            Session::flash("success","gagal update data");
        }

        Session::flash("success","success update data");
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

    public function search(string $input): LengthAwarePaginator
    {
        $result = $input;
        return Todolist::where("id", "LIKE", "%$result")
                        ->orWhere("todo", "LIKE", "%$result%")
                        ->orWhere("created_at", "LIKE", "%$result%")
                        ->orWhere("updated_at", "LIKE", "%$result%")
                        ->paginate(5);
    }

    public function render()
    {
        $search_data = $this->search($this->input);
        return view('livewire.todolist-livewire', [
            "todolistss" => $search_data->isNotEmpty() ? $search_data : Todolist::paginate(5)
        ]);
    }
}
