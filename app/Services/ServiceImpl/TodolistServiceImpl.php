<?php

namespace App\Services\ServiceImpl;

use App\Models\Todolist;
use App\Services\TodolistService;
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

    public function search(string $todo): array|Collection
    {
        return Todolist::where("todo", "LIKE", "%$todo%")->get();
    }
}
