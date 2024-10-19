<?php

namespace App\Livewire\Forms;

use App\Services\ServiceService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateServiceForm extends Component
{

    use Toast;

    public string $name;
    public string $price;
    public string $description;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }

    #[On('priceUpdated')]
    public function setprice($value)
    {
        $this->price = $value;
    }

    #[On('descriptionUpdated')]
    public function setdescription($value)
    {
        $this->description = $value;
    }

    #[On('nameUpdated')]
    public function setNameAttr($value)
    {
        $this->name = $value;
    }


    public function register(ServiceService $serviceService)
    {
        $this->validate();
        if (!$serviceService->register(['user_id' => Auth::id(), 'name' => $this->name, 'description' => $this->description, 'price' => str_replace(',', '.', $this->price)])) {
            $this->error(
                title: 'Error creating service',
                position: 'toast-top toast-center',
                icon: 'o-exclamation-circle',
                timeout: 3000,
            );
            return;
        }
        return to_route("services");
    }

    public function render()
    {
        return view('livewire.forms.create-service-form');
    }
}
