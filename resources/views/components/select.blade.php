@props([
  'for' => '',
  'label' => '',
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

@aware(['error'] )

<div class="inline-block">
    @if ($label)
        <label class="" for={{$for}}>{{$label}}:</label>
    @endif

    @if($error)
        <select {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "select select-error w-full max-w-xs"]) }} >    
    @else
        <select {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "select w-full max-w-xs"]) }} >
    @endif    
    {{ $slot }}
    </select>
</div>