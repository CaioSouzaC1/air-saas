<div>
    
@php
    $clients = App\Models\Client::with('user')->where('worker_id', Auth::id())->paginate($this->perPage);

    $headers = [
        ['key' => 'user.telephone', 'label' => 'Telephone'],
        ['key' => 'user.name', 'label' => 'Name'],
        ['key' => 'actions', 'label' => 'Actions'], 
    ];
@endphp

<livewire:tables.table-title text="List of customers" />

<x-table 
    class="bg-base-300 text-base-content"
    :headers="$headers"
    :rows="$clients"
    with-pagination
    per-page="perPage"
    :per-page-values="[10, 20, 30]"
>

    @scope('cell_user.telephone', $client)
        <strong>{{ $client->user->telephone }}</strong>
    @endscope

    @scope('cell_user.name', $client)
        {{$client->user->name}}
    @endscope

    @scope('cell_actions', $client)

        <x-button 
            icon="o-trash" 
            wire:click="delete({{ $client->id }})"
            spinner 
            class="btn-sm" 
        />
    @endscope

</x-table>
</div>