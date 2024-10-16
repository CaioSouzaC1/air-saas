<div>
    
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
            wire:click="delete('{{ $client->id }}')"
            class="btn-sm" 
        />
    @endscope
</x-table>
</div>