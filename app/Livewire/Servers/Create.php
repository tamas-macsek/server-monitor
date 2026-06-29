<?php

namespace App\Livewire\Servers;

use App\Models\Server;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Add server')]
class Create extends Component
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $ip_address = '';

    public bool $is_active = true;

    public function mount()
    {
        $this->authorize('create', Server::class);
    }

    public function save()
    {
        $this->validate();

        Auth::user()->servers()->create([
            ...$this->only(['name', 'ip_address', 'is_active']),
            'api_token' => Str::random(64),
        ]);

        $this->redirectRoute('server.list');
    }

    public function render()
    {
        return view('livewire.servers.create');
    }
}
