@props([
  'for' => '',
  'label' => '',
  'disabled' => false,
  'error' => false,
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => 'inline-block']) }}>

    @if ($label)
        <label class="label" for={{ $for }}>
            <span class="label-text">{{ $label }}</span>
        </label>
    @endif

    <select
        @disabled($disabled)
        @class([
            'select',
            'w-full',
            'max-w-xs',
            'disabled:cursor-default',
            'disabled:font-bold',
            'disabled:text-xl',
            ($error ? 'select-error': ''),
        ])
        wire:key="{{ $key }}"
    >
        {{ $slot }}
    </select>
</div>
