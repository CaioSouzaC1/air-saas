<x-form wire:submit="login">

    <livewire:forms.form-title text="Login" />

    <livewire:forms.inputs.telephone-input /> 

    <livewire:forms.inputs.password-input />
 
    <div class="flex justify-between items-center"> 
        <p class="text-sm">
            Does not have an account? 
        </p>
        <x-button wire:click="navigateToCreateView" label="Create Now" icon='o-user-plus' class="btn-primary btn-sm text-sky-50" type="button" />
    </div>

    <x-slot:actions>
        <x-button label="Login" icon='o-user-circle' class="btn-primary text-sky-50" type="submit" spinner="login" />
    </x-slot:actions>
</x-form>
