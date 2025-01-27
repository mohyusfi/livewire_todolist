<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Todolist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TodolistTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Todolist::class)
            ->assertStatus(200);
    }
}
