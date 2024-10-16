<div>
    
    <livewire:tables.table-title text="List of Machines" />
    
    <x-table 
        class="bg-base-300 text-base-content"
        :headers="$headers"
        :rows="$machines"
        with-pagination
        per-page="perPage"
        :per-page-values="[10, 20, 30]"
    >
    
        @scope('cell_machine.name', $machine)
            <strong>{{ $machine->name }}</strong>
        @endscope
    
        @scope('cell_machine.model', $machine)
            {{$machine->model}}
        @endscope
    
        @scope('cell_actions', $machine)
            <x-button 
                icon="o-trash" 
                wire:click="delete('{{ $machine->id }}')"
                class="btn-sm" 
            />
        @endscope
    </x-table>
    </div>