<?php

namespace App\Livewire\Forms;

use App\Services\AuthService;
use Livewire\Component;

class LoginForm extends Component
{

    public string $telephone = '';
    public string $password = '';

    protected $listeners = [
        'telephoneUpdated' => 'setTelephone',
        'passwordUpdated' => 'setPassword',
    ];

    public function rules()
    {
        return [
            'telephone' => ['required', 'integer'],
        ];
    }

    public function setTelephone($value)
    {
        $this->telephone = $value;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function login(AuthService $authService)
    {
        $this->validate();
        $authService->login($this->all());
    }

    public function navigateToCreateView()
    {
        return redirect('/create-account');
    }

    public function render()
    {
        return view('livewire.forms.login-form');
    }
}
