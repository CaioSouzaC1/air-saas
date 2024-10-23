<?php

namespace App\Livewire\Forms;

use App\Services\OperatorService;
use Mary\Traits\Toast;
use Livewire\Attributes\On;
use Livewire\Component;

class RegisterOperatorForm extends Component
{

    use Toast;

    public string $telephone = '';
    public string $name = '';

    public function rules()
    {
        return [
            'telephone' => ['required', 'integer', 'unique:users,telephone'],
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

    public function register(OperatorService $operatorService)
    {

        if (!$operatorService->register($this->validate())) {
            $this->error(
                title: 'Error creating operator',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
            return;
        }
        return to_route("operators");
    }

    public function render()
    {
        return view('livewire.forms.register-operator-form');
    }
}
