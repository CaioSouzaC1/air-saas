<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class DescriptionInput extends Component
{

    public string $description;

    public function rules()
    {
        return [
            'description' => ['string', 'required'],
        ];
    }

    public function updatedDescription($value)
    {
        $this->dispatch('descriptionUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.inputs.description-input');
    }
}
