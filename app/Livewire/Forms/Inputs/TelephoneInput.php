<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class TelephoneInput extends Component
{
    public string $telephone;

    public function rules()
    {
        return [
            'telephone' => ['required', 'integer'],
        ];
    }


    public function updatedTelephone($value)
    {
        $this->dispatch('telephoneUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.inputs.telephone-input');
    }
}
