@props([
    'password' => false,
    'key' => null,
    'placeholder' => '',
    'error' => false,
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<input
    type = "{{ $password ? 'password' : 'text' }}"
    placeholder = "{{$placeholder}}"
    @if ($error)
        {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => 'input input-bordered  input-error w-full']) }}   
    @endif
    {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => 'input input-bordered w-full']) }}
    wire:key="{{ $key }}"
/>