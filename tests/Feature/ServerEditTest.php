<?php

use App\Livewire\Servers\Edit;
use App\Models\Server;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('saving the form updates the server and redirects to the server list', function () {
    $user = User::factory()->create();
    $server = Server::factory()->for($user)->create();

    Livewire::actingAs($user)
        ->test(Edit::class, ['server' => $server])
        ->set('name', 'Updated name')
        ->set('ip_address', '10.0.0.1')
        ->set('is_active', false)
        ->call('save')
        ->assertRedirect(route('server.list'));

    expect($server->refresh())
        ->name->toBe('Updated name')
        ->ip_address->toBe('10.0.0.1')
        ->is_active->toBeFalse();
});
