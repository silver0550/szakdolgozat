<x-menu.horizontal class='mr-20'>
    <x-slot name="main">
        <a>
            {{$user->name}}
            <x-icon.arrowDown class="relative right-3"/>
        </a>
    </x-slot>
    <x-slot name="subs">
        <li>
            <a wire:click="$emit('openModal','modals.change-password',['{{$user->id}}'])">Jelszó Csere</a>
        </li>

    </x-slot>
</x-menu.horizontal>
