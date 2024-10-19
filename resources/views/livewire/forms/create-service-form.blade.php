<x-form wire:submit="register">

    <livewire:forms.form-title text="Register Service" />

    <livewire:forms.inputs.name-input />
    <livewire:forms.inputs.price-input />
    <livewire:forms.inputs.description-input /> 

    <x-slot:actions>
        <x-button label="Register" icon='o-wrench-screwdriver' class="btn-primary text-sky-50" type="submit" spinner="register" />
    </x-slot:actions> 

</x-form>