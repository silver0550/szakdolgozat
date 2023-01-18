<div class = 'sidebar'>
    <header class="sb-header">{{$user->name}}</header>      
    <ul>
    @foreach ($menuItems as $item)
        <li><a><i class= {{$item['icon']}}></i>{{$item['name']}}</a></li>
    @endforeach
    </ul>
    
</div>
