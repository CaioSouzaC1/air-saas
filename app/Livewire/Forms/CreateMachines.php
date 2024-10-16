<?php

namespace App\Livewire\Forms;

use App\Models\Client;
use App\Services\MachineService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateMachines extends Component
{

    use Toast;

    public string $clientId;
    public string $name;

    public string $model;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'model' => ['required', 'string'],
            'clientId' => ['required', 'string'],
        ];
    }

    #[On('clientIdUpdated')]
    public function setClientId($value)
    {
        $this->clientId = $value;
    }

    #[On('modelUpdated')]
    public function setModel($value)
    {
        $this->model = $value;
    }

    #[On('nameUpdated')]
    public function setNameAttr($value)
    {
        $this->name = $value;
    }

    public function register(MachineService $machineService)
    {
        $this->validate();
        if (!$machineService->register(['user_id' => $this->clientId, 'name' => $this->name, 'model' => $this->model])) {
            $this->error(
                title: 'Error creating machine',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
            return;
        }
        return to_route("machines");
    }

    public function getClientsProperty()
    {
        return Client::with('user')
            ->where('worker_id', Auth::id())
            ->get();
    }

    public function render()
    {
        return view('livewire.forms.create-machines', [
            'clients' => $this->clients,
        ]);
    }
}
