<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{

    public bool $showDrawer = false;

    public function openDrawer()
    {
        $this->showDrawer = true;
    }

    public function closeDrawer()
    {
        $this->showDrawer = false;
    }

    public function logout()
    {
        Auth::logout();
        to_route("welcome");
    }

    public function login()
    {
        return to_route("login");
    }

    public function render()
    {
        return view('livewire.header');
    }
}
