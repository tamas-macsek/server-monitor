<div class="flex justify-center items-center">
    <flux:card class="space-y-6 md:w-1/2">
        <div>
            <flux:heading size="lg">{{ $heading }}</flux:heading>
        </div>

        <div class="space-y-6">
            <flux:input label="Name" type="text" placeholder="Server name" wire:model="name" />
        </div>
        <div class="space-y-6">
            <flux:input label="IP Address" type="text" placeholder="xx.xx.xx.xx" wire:model="ip_address" />
        </div>
        <div class="space-y-6">
            <flux:checkbox checked wire:model="is_active" />
        </div>

        <div class="flex space-y-2 gap-2">
            <flux:button variant="primary" wire:click="save">Save</flux:button>
            <flux:button :href="route('server.list')">Go back</flux:button>
        </div>
    </flux:card>
</div>
