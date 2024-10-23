<div>
    <livewire:tables.table-title text="List of Machines" />
    <x-table class="bg-base-300 text-base-content" :headers="$headers" :rows="$machines">

        @scope('cell_actions', $machine)
        <x-button icon="o-calendar" wire:click="openModal" class="btn-sm" />
        @endscope

    </x-table>

    <x-modal wire:model="showModal" title="List of Scheduled"
        subtitle="All maintenance already carried out on the machine">
        <x-table class="bg-base-300 text-base-content" :headers="$headersSchedule" :rows="$schedule" with-pagination
            per-page="perPage" :per-page-values="[10, 20, 30]">

        </x-table>
        <x-slot:actions>
            <x-button label="Close" wire:click="closeModal" />
        </x-slot:actions>
    </x-modal>
</div>