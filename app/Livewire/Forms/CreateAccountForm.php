<?php

namespace App\Livewire\Forms;

use App\Services\AuthService;
use Livewire\Component;

class CreateAccountForm extends Component
{

    public string $telephone = '';
    public string $password = '';
    public string $email = '';

    protected $listeners = [
        'telephoneUpdated' => 'setTelephone',
        'passwordUpdated' => 'setPassword',
        'emailUpdated' => 'setEmail'
    ];


    public function setTelephone($value)
    {
        $this->telephone = $value;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function render()
    {
        return view('livewire.forms.create-account-form');
    }

    public function register(AuthService $authService)
    {
        // dd($this->all(), $this->email, $this->password);
        $authService->register($this->all());
    }

    public function navigateToLoginView()
    {
        return redirect('/');
    }
}
