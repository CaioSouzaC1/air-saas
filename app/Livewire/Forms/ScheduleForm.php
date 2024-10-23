<?php
namespace App\Livewire\Forms;
//aparecer some o me
//worker aparecer os operators e o me
use App\Models\Client;
use App\Models\Operator;
use App\Models\Service;
use App\Models\User;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ScheduleForm extends Component
{
    public $clients = [];
    public $machines = [];
    public $services = [];

    public $operator = [];
    public string|null $clientId;

    public string|null $machineId;

    public string|null $serviceId;

    public string|null $operatorId;

    public string|null $date;

    public function rules()
    {
        return [
            'clientId' => ['required', 'uuid', 'exists:users,id'],
            'machineId' => ['required', 'uuid', 'exists:machines,id'],
            'serviceId' => ['required', 'string', 'exists:services,id'],
            'operatorId' => ['required', 'uuid', 'exists:users,id'],
            'date' => ['required', 'date', 'after:' . now()->addHours(3)],
        ];
    }
    public function mount()
    {
        $this->clients = match (Auth::user()->type) {
            'worker' => User::whereHas('client', function ($query) {
                    $query->where('worker_id', Auth::user()->worker->id);
                })->get(),

            'operator' => User::whereHas('client', function ($query) {
                    $query->where('worker_id', Auth::user()->operator->worker_id);
                })->get(),
        };
        $this->operator = match (Auth::user()->type) {
            'worker' => array_merge([['id' => Auth::id(), 'name' => 'Me']], User::whereHas('operator', function ($query) {
                    $query->where('worker_id', Auth::user()->worker->id);
                })->get()->toArray()),

            'operator' => User::whereHas('operator', function ($query) {
                    $query->where('id', Auth::user()->operator->id);
                })->get(),
        };

        $this->services = match (Auth::user()->type) {
            'worker' => Service::where(['worker_id' => Auth::user()->worker->id])->get(),
            'operator' => Service::where(['worker_id' => Auth::user()->operator->worker_id])->get(),
        };

    }


    public function updatedClientId()
    {
        $this->machines = User::find($this->clientId)->machines ?? [];
    }

    public function save(ScheduleService $scheduleService)
    {
        if (!$scheduleService->store($this->validate())) {
            $this->error(
                title: 'Error creating operator',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
            return;
        }
        return to_route("schedule");


    }

    public function render()
    {
        return view('livewire.forms.schedule-form');
    }
}
