@props([
  'for' => '',
  'label' => '',
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<div class="inline-block">
    @if ($label)
        <label class="" for={{$for}}>{{$label}}:</label>
    @endif  
    <select {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "select select-ghost max-w-xs"]) }} >
        {{ $slot }}
    </select>
</div>