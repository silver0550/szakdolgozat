
<div class="fixed top-0 right-0 left-60">
    <div class="navbar  justify-end bg-neutral text-neutral-content">
        <a class="btn btn-ghost btn-sm normal-case text-sm">Téma</a>
        
            @can('Admin')
                <ul  class="menu menu-horizontal mr-20 px-1">
                    <li tabindex="0">
                        <div class="indicator ">
                            <span class="indicator-item badge badge-primary cursor-default top-3">{{$notification}}</span> 
                            <a>
                                <x-icon.bell class="cursor-pointer  hover:text-blue-500 " />
                            </a>
                        </div>
                        <ul class="p-2 bg-base-100">
                            <li>
                                <div class="indicator ">
                                    <span class="indicator-item badge badge-primary cursor-default top-3">{{$password}}</span> 
                                    <x-button.tooltip label="jelszó visszaállítás">
                                        <a href="{{route('password-reset')}}">
                                            <x-icon.password class=""/>
                                        </a>
                                </x-button.tooltip>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="indicator ">
                                    <span class="indicator-item badge badge-primary cursor-default top-3">{{$password}}</span> 
                                    <a>
                                        <x-icon.password class="mx-auto"/>
                                    </a>
                                </div>
                            </li> --}}
                          
                        </ul>
                      </li>
            @endcan
        </div>
    </div>
</div>