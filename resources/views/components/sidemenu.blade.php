<ul class="flex-1 menu p-4 text-base-content gap-4">
    <li class="text-center pb-3 text-xl border-b border-base-500">{{auth()->user()->name}}</li>
    <li>
        <a href="{{route('home')}}"> <x-icon.home />Home</a> 
    </li>
    <div class="collapse collapse-arrow overflow-hidden rounded-box">
        <input type="checkbox" class="peer" @checked(false)/>
        <span class="collapse-title peer-checked:bg-base-300">
            <x-icon.settings/>Dashboard
        </span>
        <ul class="menu collapse-content peer-checked:bg-base-300">
            <li>
                <a 
                    href="{{ route('users') }}"
                    {{-- @class(['active' => $isActive('cms.ads.index', 'cms.ads.create', 'cms.ads.edit')]) --}}
                >
                    <x-icon.people />Alkalmazottak
                </a>
            </li>
            <li>
                <a 
                    href="#"
                    {{-- @class(['active' => $isActive('cms.ads.index', 'cms.ads.create', 'cms.ads.edit')]) --}}
                >
                    <x-icon.phone-link-round />Eszközök
                </a>
            </li>

    </div>
    <li>
        <a href="#"> <x-icon.search />Keresés</a> 
    </li>
    <li>
        <a href="{{route('logout')}}"> <x-icon.exit />Kilépés</a>
    </li>
</ul>