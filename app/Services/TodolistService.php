<?php

namespace App\Services;

use App\Models\Todolist;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

interface TodolistService {
    public function create(string $todo, int $user_id): Todolist;
    public function update(string $todo, array $id): bool;
    public function delete(int $id): bool;
    public function search(string $input): LengthAwarePaginator;
}
