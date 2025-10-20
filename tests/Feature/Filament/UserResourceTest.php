<?php

use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Models\User;
use function Pest\Laravel\{actingAs, get};
use function Pest\Livewire\livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create([
        'email' => 'admin@example.com',
        'email_verified_at' => now(),
    ]);
    actingAs($this->admin);
});

it('can render index page', function () {
    $this->get(UserResource::getUrl('index'))->assertSuccessful();
});

it('can render list users', function () {
    livewire(ListUsers::class)->assertSuccessful();
});

it('can render create user page', function () {
    $this->get(UserResource::getUrl('create'))->assertSuccessful();
});

it('has a form', function () {
    livewire(CreateUser::class)
        ->assertFormExists();
});

it('fill create user form', function () {
    livewire(CreateUser::class)
        ->fillForm([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ])
        ->assertSuccessful();
});

it('can edit user', function () {
    $user = User::factory()->create([
        'email' => 'jane@example.com',
    ]);

    livewire(EditUser::class, [$user->id])
        ->assertFormSet([
            'email' => 'jane@example.com',
        ])
        ->assertSuccessful();
});

it('can view user', function () {
    $user = User::factory()->create([
        'email' => 'jane@example.com',
    ]);

    livewire(ViewUser::class, [$user->id])
        ->assertFormSet([
            'email' => 'jane@example.com',
        ])
        ->assertSuccessful();
});