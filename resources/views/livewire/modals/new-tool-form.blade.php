<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.phone-link-round/>
        </x-slot>
        <x-slot name='label'>
            <span>Új Eszköz</span>
        </x-slot>
    </x-modals.header>
    @livewire('modals.tool-form.tool-form', /* ['user' => $user, 'readonly' => false, 'target' => 'create'] */)
</div>
