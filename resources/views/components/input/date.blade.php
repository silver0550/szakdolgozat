@props([
    'key' => null,
    'placeholder' => '',
    'readonly' => false,
])

@aware(['error'] )

@php
    $key = $key ?? md5($attributes->wire('model'));

    $style = 'input input-bordered w-full disabled:cursor-default disabled:font-bold disabled:text-xl';
    if ($error) {
        $style = $style.' input-error';
    }

@endphp

<input
    
    type = "date"
    placeholder = "{{ $placeholder }}"
    @disabled($readonly)

    {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => $style]) }}
    wire:key="{{ $key }}"
/>