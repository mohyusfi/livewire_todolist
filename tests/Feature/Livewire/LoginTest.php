<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function component_exists_on_page(): void
    {
        $this->get("/login")
            ->assertSeeLivewire(Login::class);
    }

    public function testRenderSuccessfully(): void
    {
        Livewire::test(Login::class)
            ->assertStatus(200)
            ->assertSee("email")
            ->assertSee("password")
            ->assertSee("login");
    }

    public function testFieldCannotBlank()
    {
        Livewire::test(Login::class)
            ->set("email", "")
            ->set("password", "")
            ->call("login")
            ->assertHasErrors("email")
            ->assertHasErrors("password");
    }

    public function testCan_set_properties()
    {
        Livewire::test(Login::class)
            ->set("email", "jamal@gmail.com")
            ->set("password", "rahasia")
            ->assertSet("email", "jamal@gmail.com")
            ->assertSet("password", "rahasia");
    }

    public function testSuccessfullyLogin(): void
    {
        $user = User::factory()->create([
            'name' => "anas",
            'email' => 'anas@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Livewire::test(Login::class)
            ->set("email", "anas@gmail.com")
            ->set("password", "12345678")
            ->call("login")
            ->assertRedirect("/");
    }

    public function testInvalidLogin(): void
    {
        $user = User::factory()->create([
            'name' => "anas",
            'email' => 'anas@gmail.com',
            'password' => "12345678",
        ]);

        Livewire::test(Login::class)
            ->set("email", "anas@gmail.com")
            ->set("password", "1234567")
            ->call("login")
            ->assertHasErrors(["failed"])
            ->assertReturned(false);
    }
}
