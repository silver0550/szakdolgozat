@props([
    'label' => '',
])

<div {{ $attributes->merge(['class' => 'tooltip pr-2 ml-3'])}} data-tip='{{ $label }}'>
    {{ $slot }}
</div>
