<?php

namespace App\Services\ServiceImpl;

use App\Models\Todolist;
use App\Services\TodolistService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class TodolistServiceImpl implements TodolistService
{
    public function create(string $todo, int $user_id): Todolist
    {
        return Todolist::create([
            "todo" => $todo,
            "user_id" => $user_id
        ]);
    }

    public function update(string $todo, array $id): bool
    {
        if (Todolist::whereIn("id", $id)->get()) {
            return Todolist::whereIn("id", $id)->update(["todo" => $todo]);
        }

        return false;
    }

    public function delete(int $id): bool
    {
        return Todolist::find($id)->delete();
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
}
