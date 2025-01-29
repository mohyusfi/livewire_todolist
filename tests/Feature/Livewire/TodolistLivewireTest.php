<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TodolistLivewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TodolistLivewireTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(TodolistLivewire::class)
            ->assertStatus(200);
    }
}
