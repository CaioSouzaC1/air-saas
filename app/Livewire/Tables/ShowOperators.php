<?php

namespace App\Livewire\Tables;

use App\Models\Operator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOperators extends Component
{
    use WithPagination;
    public string $perPage = '10';

    public function getHeadersProperty()
    {
        return [
            ['key' => 'user.telephone', 'label' => 'Telephone'],
            ['key' => 'user.name', 'label' => 'Name'],
            ['key' => 'user.type', 'label' => 'Type'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
    }

    public function getOperatorsProperty()
    {
        return Operator::with('user')
            ->where('worker_id', Auth::user()->worker_id)
            ->paginate($this->perPage);
    }

    public function delete($id)
    {
        $operator = Operator::find($id);
        $operator->delete();
        $operator->user->delete();
    }
    public function render()
    {
        return view(
            'livewire.tables.show-operators',
            [
                'headers' => $this->headers,
                'operators' => $this->operators
            ]
        );
    }
}
