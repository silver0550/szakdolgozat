<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.people/>
        </x-slot>
        <x-slot name='label'>
            <span>Új felhasználó</span>
        </x-slot>
    </x-modals.header>
    <x-modals.body class="flex flex-col text-center">
        <x-input.form-control-together :error="$errors->first('user.name')" label='Név'>
            <x-input.text wire:model.debounce='user.name'  />
        </x-input.form-control-together>
        <x-input.form-control-together :error="$errors->first('user.email')" label='Email'>
            <x-input.text wire:model.debounce='user.email' />
        </x-input.form-control-together>
        <x-input.form-control-together :error="$errors->first('avatar')" label='Avatár'>
            <input wire:click="$set('avatar','')" wire:model='avatar' type="file" class="file-input file-input-sm file-input-bordered file-input-primary w-full max-w-xs" />
        </x-input.form-control-together>

    </x-modals.body>
    <x-modals.control>
        <x-button.primary wire:click="save" class="btn-sm mr-3">Mentés</x-button.primary>
        <x-button.primary wire:click="$emit('closeModal')" class="btn-sm">Mégsem</x-button.primary>
    </x-modals.control>
    
</div>   
