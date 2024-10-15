<x-form wire:submit="register">

    <livewire:forms.form-title text="Register Client" />

    <livewire:forms.inputs.name-input />
    <livewire:forms.inputs.telephone-input /> 
 
    <x-slot:actions>
        <x-button label="Register" icon='o-user-plus' class="btn-primary text-sky-50" type="submit" spinner="register" />
    </x-slot:actions> 

</x-form>