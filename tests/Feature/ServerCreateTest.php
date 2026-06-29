<?php

use App\Livewire\Servers\Create;
use App\Models\Server;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('saving the form creates a server for the current user and redirects to the server list', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Create::class)
        ->set('name', 'New server')
        ->set('ip_address', '10.0.0.1')
        ->set('is_active', true)
        ->call('save')
        ->assertRedirect(route('server.list'));

    expect(Server::where('user_id', $user->id)->sole())
        ->name->toBe('New server')
        ->ip_address->toBe('10.0.0.1')
        ->is_active->toBeTrue();
});
