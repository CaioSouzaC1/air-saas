<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class FormTitle extends Component
{

    public string $text;

    public function render()
    {
        return view('livewire.forms.form-title');
    }
}
