<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.password/>
        </x-slot>
        <x-slot name='label'>
            <span>Jelszó csere </span>
        </x-slot>
    </x-modals.header>   
    <x-modals.body>
        <p class="text-center font-bold text-2xl mt-6">A jelszó megváltoztatásához <br/>adja meg a következő adatokat! </p>
        <x-input.form-control :error="$errors->first('passwords.current')" class=" mx-20 mt-8" label="Aktuális jelszó*">
            <x-input.text wire:model='passwords.current' password />
        </x-input.form-control>
        <x-input.form-control :error="$errors->first('passwords.new')" class=" mx-20 " label="Új jelszó*">
            <x-input.text wire:model='passwords.new' password />
        </x-input.form-control>
        <x-input.form-control :error="$errors->first('passwords.newAgain')" class=" mx-20 " label="Új jelszó megerősítése*">
            <x-input.text wire:keydown.enter='save' wire:model='passwords.newAgain' password />
        </x-input.form-control>
    </x-modals.body>
    <x-modals.control>
        <x-button.primary wire:click='save' class="btn-sm mr-5">Mentés</x-button.primary>
    </x-modals.control>

  
</div>
