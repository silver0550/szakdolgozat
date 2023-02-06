<div>
    <div class = 'sidebar'>
        <header class="sb-header">{{$user->name}}</header>      
        <ul>
        @foreach ($menu as $item)
            <li><a wire:click={{$item['function']}}><i class= {{$item['icon']}}></i>{{$item['name']}}</a></li>
        @endforeach
        </ul>
            
    </div>
    <div class="content">
        @if($page ==='self-page') @livewire('main.self-page') @endif
        @if($page ==='dash-board') @livewire('main.dash-board') @endif
        @if($page ==='search') @livewire('main.search') @endif
    </div>
</div>
