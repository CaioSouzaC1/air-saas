<?php

namespace App\Livewire\Tables;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowServices extends Component
{

    use WithPagination;

    public string $perPage = '10';

    public function getHeadersProperty()
    {
        return [
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'description', 'label' => 'Description'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
    }

    public function getServicesProperty()
    {
        return Service::where(['user_id' => Auth::id()])->paginate($this->perPage);
    }

    public function delete($id)
    {
        Service::findOrFail($id)->delete();
    }
    public function render()
    {
        return view('livewire.tables.show-services', [
            'headers' => $this->headers,
            'services' => $this->services,
        ]);
    }
}
