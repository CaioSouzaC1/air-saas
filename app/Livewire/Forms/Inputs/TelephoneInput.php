<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class TelephoneInput extends Component
{
    public string $telephone;

    public function rules()
    {
        return [
            'telephone' => ['string', 'regex:/^\(\d{2}\) \d{5}-\d{4}$/'],
        ];
    }

    public function updatedTelephone($value)
    {
        $this->dispatch('telephoneUpdated', preg_replace('/\D/', '', $value));
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
