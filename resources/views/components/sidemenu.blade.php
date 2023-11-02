<ul class="flex-1 menu p-4 text-base-content gap-4">
    <li class="text-center text-xl border-b border-base-500">
        <span class='flex justify-center p-0 pb-3'>
        <div class="avatar">
            <div class="w-14 rounded-full">
              <img src="{{ user()->img }}" alt="Avatar"/>
            </div>
        </div>
        {{ user()->name }}
        </span>
    </li>
{{--    <li>--}}
{{--        <a href="{{route('home')}}" @class(['active' => $isActive('home')])>--}}
{{--            <x-icon.home/>{{ __('side_menu.home') }}</a>--}}
{{--    </li>--}}
    <div class="collapse collapse-arrow overflow-hidden rounded-box">
        <input type="checkbox" class="peer" @checked($isActive('users','tools'))/>
        <span class="collapse-title peer-checked:bg-base-300">
            <x-icon.settings/> <span class="p-2">{{ __('side_menu.database') }}</span>
        </span>
        <ul class="menu collapse-content peer-checked:bg-base-300">
            <li>
                <a href="{{ route('users') }}"
                    @class(['active' => $isActive('users')])>
                    <x-icon.people/> {{ __('side_menu.users') }}
                </a>
            </li>
            <li>
                <a
                    href="{{ route('tools') }}"
                    @class(['active' => $isActive('tools')])>
                    <x-icon.phone-link-round/>{{ __('side_menu.tools') }}
                </a>
            </li>
        </ul>
    </div>
    <li>
        <a href="{{ route('assignment') }}" @class(['active' => $isActive('assignment')])>
            <x-icon.pencil/>{{ __('side_menu.assignment') }}
        </a>
    </li>
    <li>
        <a href="{{ route('roles') }}" @class(['active' => $isActive('roles')])>
            <x-icon.role/>{{ __('side_menu.roles') }}
        </a>
    </li>
    <li>
        <a href="{{ route('history') }}" @class(['active' => $isActive('history')])>
            <x-icon.history/>{{ __('side_menu.history') }}
        </a>
    </li>
{{--    <li>--}}
{{--        <a href="{{ route('search') }}" @class(['active' => $isActive('search')])>--}}
{{--            <x-icon.search/>{{ __('side_menu.search') }}--}}
{{--        </a>--}}
{{--    </li>--}}
    <li>
        <a href="{{ route('logout') }}">
            <x-icon.exit/>{{ __('side_menu.exit') }}</a>
    </li>
</ul>
