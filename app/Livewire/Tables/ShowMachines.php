<?php

namespace App\Livewire\Tables;

use App\Models\Machine;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMachines extends Component
{

    use WithPagination;

    public string $perPage = '10';
    public bool $showModal = false;
    public string $qrcodeSrc = '';
    public string $machineId = '';

    public function getHeadersProperty()
    {
        return [
            ['key' => 'machine.name', 'label' => 'Name'],
            ['key' => 'machine.model', 'label' => 'Model'],
            ['key' => 'qrcode', 'label' => 'QR CODE'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
    }

    public function getMachinesProperty()
    {
        return Machine::with('user')
            ->whereHas('user.client', function ($query) {
                $query->where('worker_id', Auth::id());
            })
            ->paginate($this->perPage);
    }

    public function delete($id)
    {
        dd('tem delete ainda nao');
    }

    public function openModal($machineId)
    {
        $this->machineId = $machineId;
        $this->showModal = true;
        $machine = Machine::where(['id' => $machineId])->first();
        $this->qrcodeSrc = $machine->generateQrCode();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.tables.show-machines', [
            'headers' => $this->headers,
            'machines' => $this->machines
        ]);
    }
}
