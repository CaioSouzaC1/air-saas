<header class="flex h-14 border-b border-secondary py-2 justify-between max-w-md mx-auto px-4">
    <img class="w-10 h-10" src="/images/brand/logo.svg" alt="xdxd">
    <x-drawer wire:model="showDrawer" class="w-9/12 lg:w-1/3">
        <div>...</div>
        <x-button label="Close" wire:click="closeDrawer" />
    </x-drawer>
    <x-button class="btn-sm btn-secondary text-sky-50" icon='o-bars-4' wire:click="openDrawer" />
</header>

