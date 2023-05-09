@props([
    'disabled' => false,
    ])


<button 
    @if ($disabled) disabled @endif 
    {{$attributes->merge(['class' => 'btn btn-primary'])}}> 
    {{ $slot }}
</button>