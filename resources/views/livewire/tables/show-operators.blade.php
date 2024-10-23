<div>

    <livewire:tables.table-title text="List of operators" />
    <x-table class="bg-base-300 text-base-content" :headers="$headers" :rows="$operators" with-pagination
        per-page="perPage" :per-page-values="[10, 20, 30]">

        @scope('cell_actions', $operators)
        <x-button icon="o-trash" wire:click="delete('{{ $operators->id }}')" class="btn-sm" />
        @endscope

    </x-table>
</div>