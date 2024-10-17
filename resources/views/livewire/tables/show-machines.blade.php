<div>
    
    <livewire:tables.table-title text="List of Machines" />
    
    <x-modal wire:model="showModal" title="Scan this" subtitle="It will be possible to see all machine maintenance by scanning">
        <div class="mx-auto" id="qrcode-container">
            <img class="mx-auto" id="qrcode-img-{{$machineId}}" src="{{ $qrcodeSrc }}" alt="QR Code">
        </div>
        
        <x-slot:actions>
            <x-button label="Download" onclick="downloadImage('qrcode-img-{{$machineId}}')" />
            <x-button label="Close" wire:click="closeModal" />
        </x-slot:actions>
    </x-modal>
    
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
    
        @scope('cell_qrcode', $machine)
            <x-button class="btn-sm"  icon="o-qr-code" wire:click="openModal('{{$machine->id}}')" />
        @endscope
        
        @scope('cell_actions', $machine)
            <x-button 
                icon="o-trash" 
                wire:click="delete('{{ $machine->id }}')"
                class="btn-sm" 
            />
        @endscope

    </x-table>

    <script>
        function downloadImage(id) {
            const link = document.createElement('a');
            link.href = document.getElementById(id).src;
            link.download = `${id}.png`;
            link.click();
        }
    </script>
    

    </div>