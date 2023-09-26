@props([
    'disabled' => false,
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<input
    type="checkbox"
    @disabled($disabled)
    {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "toggle toggle-primary toggle-sm hover:toggle-info disabled:cursor-default"]) }}
/>
