<div>
    <div class = 'sidebar'>
        <header class="sb-header">{{$user->name}}</header>      
        <ul>
        @foreach ($menuOptions as $item)
            <li><a wire:click={{$item['function']}}><i class= {{$item['icon']}}></i>{{$item['name']}}</a></li>
        @endforeach
        </ul>
            
    </div>
    <div class="middle">{{$page}}</div>
</div>
