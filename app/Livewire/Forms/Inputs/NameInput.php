<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class NameInput extends Component
{
    public string $name;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
        ];
    }

    public function updatedName($value)
    {
        $this->dispatch('nameUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.forms.inputs.name-input');
    }
}
