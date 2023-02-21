@props([
  'for' => '',
  'label' => '',
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

<div {{$attributes ->merge(['class' => 'inline-box'])}}>
    @if ($label)
        <label class="m-auto uppercase" for={{$for}}>{{$label}}:</label>
    @endif  
    <select {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "select select-ghost ml-6 max-w-xs"]) }} >
        {{ $slot }}
    </select>
</div>