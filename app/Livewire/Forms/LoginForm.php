<?php

namespace App\Livewire\Forms;

use App\Services\AuthService;
use Livewire\Component;
use Mary\Traits\Toast;

class LoginForm extends Component
{

    use Toast;


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
        if (!$authService->login($this->all()))
            $this->error(
                title: 'Invalid credentials',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
        
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
