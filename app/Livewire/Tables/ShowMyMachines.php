<?php

namespace App\Livewire\Tables;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMyMachines extends Component
{
    use WithPagination;
    public string $perPage = '10';
    public $machineId;
    public bool $showModal = false;
    protected $queryString = ['machineId'];


    public function getHeadersProperty()
    {
        return [
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'model', 'label' => 'Model'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
    }


    public function getHeadersScheduleProperty()
    {
        return [
            ['key' => 'service.name', 'label' => 'Service'],
            ['key' => 'date', 'label' => 'Date'],
        ];
    }

    public function getMachinesProperty()
    {
        return Machine::where('id', $this->machineId)->get();
    }

    public function getScheduleProperty()
    {
        return Machine::find($this->machineId)->schedules()->with(['service', 'user'])->paginate($this->perPage);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.tables.show-my-machines', [
            'headers' => $this->headers,
            'machines' => $this->machines,
            'headersSchedule' => $this->headersSchedule,
            'schedule' => $this->schedule
        ]);
    }

}
