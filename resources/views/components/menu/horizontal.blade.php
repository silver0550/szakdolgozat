<ul {{$attributes->merge([ 'class' => 'menu menu-horizontal px-1' ])}} >

    <li tabindex="0">

        {{ $main }}

        <ul class="bg-base-100">
            
            {{ $subs }}
            
        </ul>

    </li>

</ul>