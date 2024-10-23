<?php

namespace App\Livewire\Tables;

use App\Models\Scheduling;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSchedule extends Component
{
    use WithPagination;
    public string $perPage = '10';


    public function getHeadersProperty()
    {
        return [
            ['key' => 'client.name', 'label' => 'Client'],
            ['key' => 'service.name', 'label' => 'Service'],
            ['key' => 'user.name', 'label' => 'Operator/Worker'],
            ['key' => 'date', 'label' => 'Date'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
    }

    public function getScheduleProperty()
    {
        return Scheduling::where('user_id', Auth::user()->id)
            ->with(['client', 'service', 'user'])
            ->paginate($this->perPage);
    }

    public function delete($id)
    {
        Scheduling::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.tables.show-schedule', [
            'headers' => $this->headers,
            'schedule' => $this->schedule,
        ]);
    }
}
