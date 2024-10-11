<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class PasswordInput extends Component
{

    public string $password;

    public function rules()
    {
        return [
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function updatedPassword($value)
    {
        $this->dispatch('passwordUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.inputs.password-input');
    }
}
