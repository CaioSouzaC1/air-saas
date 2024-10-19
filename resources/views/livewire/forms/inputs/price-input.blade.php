<x-input 
    label="Price" 
    wire:model.live="price" 
    inline 
    x-mask:dynamic="$moneyMask($input)" 
    icon="o-banknotes" 
/>
