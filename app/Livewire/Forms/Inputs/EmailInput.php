<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class EmailInput extends Component
{

    public string $email;

    public function rules()
    {
        return [
            'email' => ['required', 'email',],
        ];
    }

    public function updatedemail($value)
    {
        $this->dispatch('emailUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.inputs.email-input');
    }
}
