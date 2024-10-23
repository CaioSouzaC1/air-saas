<x-form wire:submit="save">
    <livewire:forms.form-title text="Register Schedule" />
    <x-choices-offline class="mb-4" icon="o-user" label="Clients" wire:model.live="clientId" :options="$clients" single
        searchable />

    <x-choices-offline class="mb-4" label="Machines" wire:model="machineId" :options="$machines" single searchable />

    <x-choices-offline class="mb-4" label="Services" wire:model="serviceId" :options="$services" single searchable />

    <x-choices-offline class="mb-4" label="Operator" wire:model="operatorId" :options="$operator" single searchable />

    <x-datetime label="Date + Time" wire:model.live="date" icon="o-calendar" type="datetime-local" />

    <x-slot:actions>
        <x-button label="To schedule" icon='o-calendar' class="btn-primary text-sky-50" type="submit"
            spinner="register" />
    </x-slot:actions>

</x-form>