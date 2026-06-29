<?php

namespace App\Livewire\Servers;

use App\Models\Server as ModelsServer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('List of servers')]
class Index extends Component
{
    public Collection $servers;

    public function mount()
    {
        $this->authorize('viewAny', ModelsServer::class);

        $servers = Auth::user()->servers;
        $this->servers = $servers;
    }

    public function delete(ModelsServer $server)
    {
        $this->authorize('delete', $server);
        $server->delete();
    }

    public function render()
    {
        return view('livewire.servers.index');
    }
}
