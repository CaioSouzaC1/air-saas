<?php

namespace App\Livewire\Forms;

use App\Services\AuthService;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class LoginForm extends Component
{

    use Toast;

    public string $telephone = '';
    public string $password = '';

    public function rules()
    {
        return [
            'telephone' => ['required', 'integer'],
            'password' => ['required', 'string'],
        ];
    }

    #[On('telephoneUpdated')]
    public function setTelephone($value)
    {
        $this->telephone = $value;
    }

    #[On('passwordUpdated')]
    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function login(AuthService $authService)
    {
        $this->validate();
        if (!$authService->login($this->all())) {
            $this->error(
                title: 'Invalid credentials',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
            return;
        }
        return to_route("dashboard");

    }

    public function navigateToCreateView()
    {
        return to_route('create-account');
    }

    public function render()
    {
        return view('livewire.forms.login-form');
    }
}
