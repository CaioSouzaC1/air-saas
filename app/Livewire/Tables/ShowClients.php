<?php

namespace App\Livewire\Tables;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowClients extends Component
{
    use WithPagination;

    public string $perPage = '10';

    public function getHeadersProperty()
    {
        return [
            ['key' => 'user.telephone', 'label' => 'Telephone'],
            ['key' => 'user.name', 'label' => 'Name'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
    }

    public function getClientsProperty()
    {
        return Client::with('user')
        ->where('worker_id', Auth::id())
            ->paginate($this->perPage);
    }

    public function delete($id)
    {
        dd($id);
        //n ta chegando aqui n sei pq

    }

    public function render()
    {
        return view('livewire.tables.show-clients', [
            'clients' => $this->clients,
            'headers' => $this->headers,
        ]);
    }
}
