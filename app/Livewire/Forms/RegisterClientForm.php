<?php

namespace App\Livewire\Forms;

use App\Services\AuthService;
use App\Services\ClientService;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class RegisterClientForm extends Component
{

    use Toast;

    public string $telephone = '';
    public string $name = '';

    public function rules()
    {
        return [
            'telephone' => ['required', 'integer'],
            'name' => ['required', 'string'],
        ];
    }

    #[On('telephoneUpdated')]
    public function setTelephone($value)
    {
        $this->telephone = $value;
    }

    #[On('nameUpdated')]
    public function setNameAttr($value)
    {
        $this->name = $value;
    }

    public function register(ClientService $clientService)
    {
        $this->validate();
        if (!$clientService->registerClient($this->all())) {
            $this->error(
                title: 'Error creating client',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
            return;
        }
        return to_route("clients");
    }

    public function navigateToCreateView()
    {
        return to_route('create-account');
    }

    public function render()
    {
        return view('livewire.forms.register-client-form');
    }
}
