@props([
    'tooltip' => '',
])


<div {{ $attributes->merge(['class' => 'tooltip pr-2 ml-3'])}} data-tip='{{$tooltip}}'>
    {{ $slot }}
</div>    