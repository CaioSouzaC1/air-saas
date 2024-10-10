<x-form wire:submit="save">
    <x-input label="Telephone" wire:model="telephone" />
    <x-input label="Password" wire:model="password" />
 
    <x-slot:actions>
        <x-button label="Cancel" />
        <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-form>
