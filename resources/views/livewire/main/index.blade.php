<div>
    <div class = 'sidebar'>
        <header class="sb-header">{{$user->name}}</header>      
        <ul>
        @foreach ($menu as $item)
            <li><a wire:click.prevent="$emit('change','{{$item['function']}}')"><i class= {{$item['icon']}}></i>{{$item['name']}}</a></li>
        @endforeach
        </ul>
            
    </div>
    <div class="content">

        @switch($currentPage)
            @case('selfpage')
                @livewire('main.self-page')
                @break
            @case('dashboard')
                @livewire('main.dash-board')
                @break
            @case('search')
                @livewire('main.search')
                @break
            @default

        @endswitch

    </div>
</div>
