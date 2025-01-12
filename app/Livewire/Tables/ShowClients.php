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
        $worker = Auth::user();
        match ($worker->type) {
            'worker' => $worker = $worker->worker,
            'operator' => $worker = $worker->operator->worker
        };
        return Client::with('user')
            ->where('worker_id', $worker->id)
            ->paginate($this->perPage);
    }

    public function delete($id)
    {
        Client::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.tables.show-clients', [
            'clients' => $this->clients,
            'headers' => $this->headers,
        ]);
    }
}
