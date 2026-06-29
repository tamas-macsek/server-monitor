<?php

namespace App\Livewire\Servers;

use App\Models\Server;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('update')]
class Edit extends Component
{
    public Server $server;

    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $ip_address;

    public bool $is_active;

    public function mount(Server $server)
    {
        $this->authorize('update', $server);
        $this->server = $server;
        $this->name = $server->name;
        $this->ip_address = $server->ip_address;
        $this->is_active = $server->is_active;
    }

    public function save()
    {
        $this->validate();
        $this->server->update($this->only(['name', 'ip_address', 'is_active']));

        $this->redirectRoute('server.list');
    }

    public function render()
    {
        return view('livewire.servers.edit');
    }
}
