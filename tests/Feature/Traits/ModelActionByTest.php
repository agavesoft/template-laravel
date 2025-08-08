<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\Fixtures\FakeModelSoftDeletes;
use Tests\Fixtures\FakeModelSpatieDeleted;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Set up any necessary preconditions for the tests
    Schema::create('fake_posts_models_table', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('description')->nullable();
        $table->userTimestamps();
    });
});

test('when user use SoftDeletes trait', function () {
    $register = FakeModelSoftDeletes::create([
        'title' => 'John Doe',
        'description' => 'lorem ipsum dolor sit amet',
    ]);

    // Usamos el método del trait
    $register->delete();

    // Verificamos
    // Si es SoftDelete
    $this->assertSoftDeleted('fake_posts_models_table', [
        'id' => $register->id,
    ]);
});

test('when user use Spatie Deleted trait', function () {
    $register = FakeModelSpatieDeleted::create([
        'title' => 'John Doe',
        'description' => 'lorem ipsum dolor sit amet',
    ]);

    // Usamos el método del trait
    $register->delete();

    // Verificamos
    // Si es Spatie Deleted
    $this->assertDatabaseMissing('fake_posts_models_table', [
        'id' => $register->id,
    ]);
});