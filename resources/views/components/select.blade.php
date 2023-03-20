@props([
  'for' => '',
  'label' => '',
  'disabled' =>false,
])

@php
    $key = $key ?? md5($attributes->wire('model'));
@endphp

@aware(['error'] )

<div class="inline-block">
    @if ($label)
        <label class="" for={{$for}}>{{$label}}:</label>
    @endif
    
    <select 
        @disabled($disabled)
        @if($error)
            {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "select select-error w-full max-w-xs"]) }}  
        @else
            {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => "select w-full max-w-xs"]) }}
        @endif    
    >
        {{ $slot }}
    </select>
</div>