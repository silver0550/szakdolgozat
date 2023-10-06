@props([
    'for' => '',
    'label' => '',
    'disabled' => false,
    'checked' => false,
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => 'form-control']) }}>
    <label class="label justify-normal cursor-pointer">
        <input type="checkbox"
               class="checkbox checkbox-primary"
               {{ $checked ? 'checked="checked"' : ''}}
               @disabled($disabled)
               wire:key="{{ $key }}"
               {{ $attributes->whereStartsWith('wire:model') }}/>
        <span class="label-text pl-3">{{ $label }}</span>
    </label>
</div>
