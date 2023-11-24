<div class='bg-base-200'>
    <x-modals.header>
        <x-slot name='icon'> <x-icon.password/></x-slot>
        <x-slot name='label'>{{ __('password_reset.password_reset') }}</x-slot>
    </x-modals.header>
    <x-modals.body class="mx-10 text-center">
        <label class="">{{ __('password_reset.get_data_message') }}</label>
        <div class= 'flex flex-col w-10/12 mx-auto mt-8'>
            <x-input.form-control
                wire:model='email'
                :error="$errors->first('email')"
                label="{{ __('password_reset.email') }} :">
                <x-input.text/>
            </x-input.form-control>
            <x-input.form-control
                wire:model='dateOfBirth'
                :error="$errors->first('dateOfBirth')"
                label="{{ __('password_reset.date_of_birth') }}:">
                <x-input.date/>
            </x-input.form-control>
            <x-input.form-control
                wire:model='entryCard'
                :error="$errors->first('entryCard')"
                label="{{ __('password_reset.entry_card') }}:">
                <x-input.text/>
            </x-input.form-control>
        </div>
    </x-modals.body>
    <x-modals.control>
        <x-button.primary wire:click='send' class="btn-sm">{{ __('global.send') }}</x-button.primary>
    </x-modals.control>
</div>
