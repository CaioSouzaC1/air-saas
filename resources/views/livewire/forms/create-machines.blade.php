<x-form wire:submit="register">

    <livewire:forms.form-title text="Register Machine" />

    <x-choices-offline
        wire:model="clientId"
        :options="$clients"
        placeholder="Search Client ..."
        single
        option-value="user.id"
        option-label="user.name"
        option-sub-label="user.telephone"
        searchable
        wire:change="$emit('clientIdUpdated', $event.target.value)"
        />

    <livewire:forms.inputs.name-input icon="o-radio" />
    <livewire:forms.inputs.model-input /> 
 
    <x-slot:actions>
        <x-button label="Register" icon='o-radio' class="btn-primary text-sky-50" type="submit" spinner="register" />
    </x-slot:actions> 

</x-form>