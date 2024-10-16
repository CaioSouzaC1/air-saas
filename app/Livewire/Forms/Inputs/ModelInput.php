<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class ModelInput extends Component
{

    public string $model;

    public function rules()
    {
        return [
            'model' => ['required', 'string'],
        ];
    }

    public function updatedModel($value)
    {
        $this->dispatch('modelUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.inputs.model-input');
    }
}
