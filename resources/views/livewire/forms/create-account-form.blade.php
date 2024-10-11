<x-form wire:submit="register">

    <livewire:forms.form-title text="Create Account" />

    <livewire:forms.inputs.email-input /> 
    
    <livewire:forms.inputs.password-input /> 

    <livewire:forms.inputs.telephone-input /> 

    <div class="flex justify-between items-center"> 
        <p class="text-sm">
            Do you alread have an account? 
        </p>
        <x-button wire:click="navigateToLoginView" label="Login now" icon='o-user' class="btn-primary btn-sm text-sky-50" type="button" />
    </div>

    <x-slot:actions>
        <x-button label="Create Account" icon='o-user-circle' class="btn-primary text-sky-50" type="submit" spinner="register" />
    </x-slot:actions>
</x-form>