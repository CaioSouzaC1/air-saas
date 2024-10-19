<?php

namespace App\Livewire\Forms\Inputs;

use Livewire\Component;

class PriceInput extends Component
{
    public $price;

    public function rules()
    {
        return [
            'price' => ['required', 'string'],
        ];
    }

    public function updatedPrice($value)
    {
        $this->dispatch('priceUpdated', $value);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.inputs.price-input');
    }
}
