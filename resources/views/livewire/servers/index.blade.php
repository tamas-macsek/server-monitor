<div class="space-y-4">
    <div class="flex justify-end">
        <flux:button :href="route('server.create')" variant="primary" icon="plus">Add new</flux:button>
    </div>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>IP Address</flux:table.column>
            <flux:table.column>Status</flux:table.column>
            <flux:table.column>Amount</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->servers as $server)
                <flux:table.row :key="$server->id">
                    <flux:table.cell>
                        {{ $server->name }}
                    </flux:table.cell>
                    <flux:table.cell class="whitespace-nowrap">{{ $server->ip_address }}</flux:table.cell>
                    <flux:table.cell class="py-0">
                        <flux:badge :color="$server->is_active ? 'green' : 'red'" size="sm">{{ $server->is_active ? "Active" : "Inactive" }}</flux:badge>
                    </flux:table.cell>
                    <flux:table.cell class="flex gap-2">
                        <flux:modal.trigger :name="'api-token-'.$server->id">
                            <flux:button size="sm" icon="key">API Token</flux:button>
                        </flux:modal.trigger>
                        <flux:button :href="route('server.edit', ['server' => $server])" size="sm" variant="primary">Edit</flux:button>
                        <flux:button size="sm" variant="danger" wire:click="delete({{ $server->id }})">Remove</flux:button>
                    </flux:table.cell>

                </flux:table.row>

                <flux:modal :name="'api-token-'.$server->id" class="md:w-96">
                    <div class="space-y-6">
                        <flux:heading size="lg">API Token</flux:heading>
                        <flux:input :value="$server->api_token" readonly copyable />
                    </div>
                </flux:modal>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
