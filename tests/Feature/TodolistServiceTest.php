<?php

namespace Tests\Feature;

use App\Models\Todolist;
use App\Models\User;
use App\Services\ServiceImpl\TodolistServiceImpl;
use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testTodolistServiceSingleton(): void
    {
        $todolistService = $this->app->make(TodolistService::class);
        $todolistService2 = $this->app->make(TodolistService::class);
        $this->assertSame($todolistService, $todolistService2);
    }

    public function testFactory(): void
    {
        $user = User::factory()->create();
        self::assertNotNull($user);

        $todolist = Todolist::factory()->create(["user_id" => $user->id]);

        self::assertNotNull($todolist);
        self::assertNotNull($todolist->todo);
        self::assertEquals($user->id, $todolist->user_id);
    }

    public function testAddTodo(): void
    {
        $todolistService = $this->app->make(TodolistService::class);
        $user = User::factory()->create();

        $todolist = $todolistService->create("Belajar Livewire", $user->id);
        self::assertEquals("Belajar Livewire", $todolist->todo);
        self::assertEquals($user->id, $todolist->user_id);
    }

    public function testUpdateTodo(): void
    {
        $todolistService = $this->app->make(TodolistService::class);
        $todolist = Todolist::factory()->create();

        $isSuccess = $todolistService->update("Belajar Livewire", [$todolist->id]);
        $todolist = Todolist::find($todolist->id);
        self::assertTrue($isSuccess);
        self::assertEquals("Belajar Livewire", $todolist->todo);
    }

    public function testDeleteTodo(): void
    {
        $todolistService = $this->app->make(TodolistService::class);
        $todolist = Todolist::factory()->create();

        $isSuccess = $todolistService->delete($todolist->id);
        self::assertTrue($isSuccess);
    }

    public function testSearchTodo(): void
    {
        $todolistService = $this->app->make(TodolistService::class);
        $todolist = Todolist::factory()->create(["todo" => "Belajar Laravel"]);

        $todolist = $todolistService->search("Belajar Laravel");
        self::assertNotNull($todolist->all());
        self::assertEquals("Belajar Laravel", $todolist[0]->todo);
    }
}
