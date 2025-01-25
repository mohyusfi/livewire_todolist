<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Register;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Register::class)
            ->assertStatus(200);
    }

    /** @test */
    public function component_exists_on_the_page()
    {
        $this->get('/register')
            ->assertSee("name")
            ->assertSee("password")
            ->assertSee("email")
            ->assertSee("Confirm Password")
            ->assertSeeLivewire(Register::class);
    }

    /** @test */
    public function it_requires_field_cannot_blank(): void
    {
        Livewire::test(Register::class)
            ->set("name", "")
            ->set("email", "")
            ->set("password", "")
            ->set("password_confirmation", "")
            ->call('save')
            ->assertHasErrors(["name", "email", "password"]);
    }

    /** @test */
    public function password_and_password_confirmation_must_be_same(): void
    {
        Livewire::test(Register::class)
            ->set("name", "jamal")
            ->set("email", "joko@gmail.com")
            ->set("password", "12345678")
            ->set("password_confirmation", "1234567")
            ->call("save")
            ->assertHasErrors(["password"]);
    }

    public function testSuccessRegister(): void
    {
        Livewire::test(Register::class)
            ->set("name", "jamal")
            ->set("email", "joko@gmail.com")
            ->set("password", "12345678")
            ->set("password_confirmation", "12345678")
            ->call("save")
            ->assertHasNoErrors(["name", "email", "password", "password_confirmation"]);

        $this->assertDatabaseHas("users", [
            "name" => "jamal",
            "email" => "joko@gmail.com",
        ]);
    }
}
