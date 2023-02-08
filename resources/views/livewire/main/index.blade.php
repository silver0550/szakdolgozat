<div>
    <div class="absolute left-60 top-3 right-2 bottom-10 card bg-base-300 rounded-box place-items-center">
     
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
            @case('addUser')
                @livewire('main.dash-board')
                @break
            @default

        @endswitch

    </div>

    <ul class="menu bg-base-100 w-64 px-5">
        <header class="my-3 text-center ">{{$user->name}}</header>
       
        @foreach ($menu as $item)
          
            <li><a wire:click.prevent="$emit('change','{{$item['page']}}')"><i class= {{$item['icon']}}></i>{{$item['name']}}</a>
           
            @if ($item->has('sub'))
                <ul class="bg-base-100">
                @foreach ($item['sub'] as $sub)
                    <li ><a wire:click.prevent="$emit('change','{{$sub['page']}}')">{{$sub['name']}}</a></li>
                @endforeach
                </ul>
            @endif

            </li>

        @endforeach
        
    </ul>


 
 


</div>
