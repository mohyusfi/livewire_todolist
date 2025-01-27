<?php

namespace App\Services\ServiceImpl;

use App\Models\Todolist;
use App\Services\TodolistService;
use Illuminate\Database\Eloquent\Collection;

class TodolistServiceImpl implements TodolistService {
    public function create(string $todo, int $user_id): Todolist
    {
        return Todolist::create([
            "todo" => $todo,
            "user_id" => $user_id
        ]);
    }

    public function update(string $todo, int $id): bool
    {
        return Todolist::where("id", $id)->update(["todo" => $todo]);
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
