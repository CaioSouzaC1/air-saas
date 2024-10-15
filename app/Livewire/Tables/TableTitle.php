<?php

namespace App\Livewire\Tables;

use Livewire\Component;

class TableTitle extends Component
{

    public string $text;

    public function render()
    {
        return view('livewire.tables.table-title');
    }
}
