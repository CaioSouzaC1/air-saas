<?php

namespace App\Livewire;

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

    public function render()
    {
        return view('livewire.header');
    }
}
