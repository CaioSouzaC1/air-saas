<div>
    
    <livewire:tables.table-title text="List of Services" />
    
    <x-table 
        class="bg-base-300 text-base-content"
        :headers="$headers"
        :rows="$services"
        with-pagination
        per-page="perPage"
        :per-page-values="[10, 20, 30]"
    >
    
        @scope('cell_name', $service)
            <div class="flex flex-col gap-1">
                <strong>{{ $service->name }}</strong>
                <span>{{ $service->price }}</span>
            </div>
        @endscope

        @scope('cell_description', $service)
            {{$service->description}}
        @endscope

        @scope('cell_actions', $service)
            <x-button 
            icon="o-trash" 
            wire:click="delete('{{ $service->id }}')"
            class="btn-sm" 
            />
        @endscope

    </x-table>
</div>