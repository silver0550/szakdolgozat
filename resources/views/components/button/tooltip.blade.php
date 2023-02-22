@props([
    'tooltip' => '',
    'side' => 'left',
])


<div {{ $attributes->merge(['class' => 'tooltip tooltip-'.$side.' pr-2 ml-3'])}} data-tip='{{$tooltip}}'>
    {{ $slot }}
</div>    