<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    private ?TodolistService $todolistService = null;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function showTodolist() : View {
        return view('todolist.show-todolist', [
            "title" => "Todolist",
            "data" => $this->todolistService->add()
        ]);
    }
}
