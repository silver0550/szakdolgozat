<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.info/>
        </x-slot>
        <x-slot name='label'>
            {{$user->name}}
        </x-slot>
    </x-modals.header>
    @livewire('modals.user-form.user-form', ['user' => $user, 'readonly' => $readonly, 'target' => 'update'])

</div>
