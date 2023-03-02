<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.delete/>
        </x-slot>
        <x-slot name='label'>
            <span>Törlés</span>
        </x-slot>
    </x-modals.header>   
    <x-modals.body>
        <p>Biztos benne hogy törli?</p>
    </x-modals.body>
    <x-modals.control>
        <x-button.primary wire:click="remove" class="btn-sm mr-5">Törlés</x-button.primary>
        <x-button.primary wire:click="$emit('closeModal')" class="btn-sm" >Mégsem</x-button.primary>
    </x-modals.control>
</div>