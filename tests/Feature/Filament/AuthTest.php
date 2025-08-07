<?php

use App\Models\User;
use Filament\Panel;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('permite acceso al panel admin solo a emails permitidos y verificados', function () {
    // Simular variable de entorno
    putenv('FILAMENT_EMAILS=admin@example.com,other@example.com');

    // Usuario permitido y verificado
    $userAllowed = User::factory()->create([
        'email' => 'admin@example.com',
        'email_verified_at' => now(),
    ]);

    // Usuario permitido pero no verificado
    $userNotVerified = User::factory()->create([
        'email' => 'other@example.com',
        'email_verified_at' => null,
    ]);

    // Usuario no permitido
    $userNotAllowed = User::factory()->create([
        'email' => 'notallowed@example.com',
        'email_verified_at' => now(),
    ]);

    $adminPanel = $this->createMock(Panel::class);
    $adminPanel->method('getId')->willReturn('admin');

    $otherPanel = $this->createMock(Panel::class);
    $otherPanel->method('getId')->willReturn('other');

    expect($userAllowed->canAccessPanel($adminPanel))->toBeTrue();
    expect($userNotVerified->canAccessPanel($adminPanel))->toBeFalse();
    expect($userNotAllowed->canAccessPanel($adminPanel))->toBeFalse();

    // Todos pueden acceder a otros paneles
    expect($userAllowed->canAccessPanel($otherPanel))->toBeTrue();
    expect($userNotVerified->canAccessPanel($otherPanel))->toBeTrue();
    expect($userNotAllowed->canAccessPanel($otherPanel))->toBeTrue();
});


