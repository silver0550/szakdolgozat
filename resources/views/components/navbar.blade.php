
<div class="fixed top-0 right-0 left-60">
    <div class="navbar  justify-end bg-neutral text-neutral-content">
        <a class="btn btn-ghost btn-sm normal-case text-sm">Téma</a>
        
            @can('Admin')
                <x-menu.horizontal>
                    <x-slot name="main">
                        <x-indicator label={{$notification}}>
                            <x-icon.bell class="cursor-pointer  hover:text-blue-500 " />
                        </x-indicator>
                    </x-slot>
                    <x-slot name="subs">
                        <li>
                            <x-indicator label={{$password}}>
                                <x-button.tooltip label="jelszó visszaállítás">
                                    <a href="{{route('password-reset')}}">
                                        <x-icon.password/>
                                    </a>
                                </x-button.tooltip>
                            </x-indicator>
                        </li>
                    </x-slot>
                </x-menu.horizontal>
            @endcan
        </div>
    </div>
</div>