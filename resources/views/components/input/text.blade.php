@props([
'password' => false,
'key' => null,
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<input
    type="{{ $password ? 'password' : 'text' }}"
    {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => 'input input-bordered w-full']) }}
    wire:key="{{ $key }}"
/>