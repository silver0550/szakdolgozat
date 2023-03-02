<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.info/>
        </x-slot>
        <x-slot name='label'>
            {{$label}}
        </x-slot>
    </x-modals.header>
    <x-modals.body class="flex flex-col text-center">
        <x-input.form-control-together :error="$errors->first('user.name')" label='Név'>
            <x-input.text :readonly='$readonly' class=" disabled:cursor-default" wire:model.debounce='user.name'/> 
        </x-input.form-control-together>
        <x-input.form-control-together :error="$errors->first('user.email')" label='Email'>
            <x-input.text :readonly='$readonly' class=" disabled:cursor-default" wire:model='user.email'/>
        </x-input.form-control-together>
    </x-modals.body>
    <x-modals.control>
        @can('Admin')
            <x-button.primary wire:click="update()" class="btn-sm">Mentés</x-button.primary>
        @endcan
    </x-modals.control>

</div>
