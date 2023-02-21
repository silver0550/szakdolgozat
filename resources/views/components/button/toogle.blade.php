@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<input type="checkbox" {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "toggle hover:toggle-info"]) }}/>