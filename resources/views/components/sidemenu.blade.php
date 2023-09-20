<ul class="flex-1 menu p-4 text-base-content gap-4">
    <li class="text-center text-xl border-b border-base-500">
        <span class='flex justify-center p-0 pb-3'>
        @if (user()->avatar_path)
        <div class="avatar">
            <div class="w-14 rounded-full">
              <img src="storage/{{ user()->avatar_path }}" alt="Avatar" />
            </div>
        </div>
        @else
        <div class="avatar">
            <div class="w-14 rounded-full">
                <img src={{\App\Enum\PictureProviderEnum::DEFAULT_AVATAR}} alt="Avatar" />
            </div>
        </div>
        @endif
        {{user()->name}}
        </span>
    </li>
    <li>
        <a href="{{route('home')}}" @class(['active' => $isActive('home')])>
        <x-icon.home />Home</a>
    </li>
    <div class="collapse collapse-arrow overflow-hidden rounded-box">
        <input type="checkbox" class="peer" @checked($isActive('users','tools'))/>
        <span class="collapse-title peer-checked:bg-base-300">
            <x-icon.settings/> <span class="p-2">Dashboard</span>
        </span>
        <ul class="menu collapse-content peer-checked:bg-base-300">
            <li>
                <a  href="{{ route('users') }}"
                    @class(['active' => $isActive('users')])>
                    <x-icon.people/> Felhasználók
                </a>
            </li>
            <li>
                <a
                    href="{{ route('tools') }}"
                    @class(['active' => $isActive('tools')])>
                    <x-icon.phone-link-round />Eszközök
                </a>
            </li>
    </div>
    <li>
        <a href="{{ route('search') }}" @class(['active' => $isActive('search')])>
            <x-icon.search />Keresés
        </a>
    </li>
    <li>
        <a href="{{route('logout')}}"> <x-icon.exit />Kilépés</a>
    </li>
</ul>
