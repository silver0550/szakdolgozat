<div class='bg-base-200'>
    <x-modals.header>
        <x-slot name='icon'> <x-icon.password/></x-slot>
        <x-slot name='label'>Jelszó viszaállítás</x-slot>
    </x-modals.header>
    <x-modals.body class="mx-10 text-center">
        <label class="">Kérem adja meg az adatait.</label>
        <div class= 'flex flex-col w-10/12 mx-auto mt-8'>
        <x-input.form-control wire:model='name' :error="$errors->first('name')" label="Név:">
            <x-input.text/>
        </x-input.form-control>
        <x-input.form-control wire:model='dateOfBirth' :error="$errors->first('dateOfBirth')" label="Születési dátum:">
            <x-input.date/>
        </x-input.form-control>
        <x-input.form-control wire:model='entryCard' :error="$errors->first('entryCard')" label="Belépő kártya száma:">
            <x-input.text/>
        </x-input.form-control>
    </x-modals.body>
</div>
    <x-modals.control>
        <x-button.primary wire:click='send' class="btn-sm">Küldés</x-button.primary>
    </x-modals.control>
</div>
