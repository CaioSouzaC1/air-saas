<div>
    <livewire:tables.table-title text="List of schedule" />
    <x-table class="bg-base-300 text-base-content" :headers="$headers" :rows="$schedule" with-pagination
        per-page="perPage" :per-page-values="[10, 20, 30]">

        @scope('cell_actions', $schedule)
        <x-button icon="o-trash" wire:click="delete('{{ $schedule->id }}')" class="btn-sm" />
        @endscope

    </x-table>
</div>