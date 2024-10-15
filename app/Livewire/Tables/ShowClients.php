<?php

namespace App\Livewire\Tables;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClients extends Component
{
    use WithPagination;

    public string $perPage = '10';

    public function delete($id)
    {
        dd($id);
        //n ta chegando aqui n sei pq

    }

    public function render()
    {
        return view('livewire.tables.show-clients');
    }
}
