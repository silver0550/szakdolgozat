<div class="bg-base-200 text-base-800">
    
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.people/>
        </x-slot>
        <x-slot name='label'>
            <span>Új felhasználó</span>
        </x-slot>
    </x-modals.header>

    @livewire('modals.user-form.user-form', ['user' => $user, 'readonly' => false, 'target' => 'create'])
   
</div>   
