<div>
    <x-drawer wire:model="showDrawer" class="w-11/12 lg:w-1/3">
        <div>...</div>
        <x-button label="Close" wire:click="closeDrawer" />
    </x-drawer>
<x-button class="btn-sm" icon='o-bars-4' wire:click="openDrawer" />
</div>

