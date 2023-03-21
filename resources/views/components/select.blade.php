@props([
  'for' => '',
  'label' => '',
  'disabled' =>false,
])

@aware(['error'] )

@php
    $key = $key ?? md5($attributes->wire('model'));

    $style = 'select w-full max-w-xs disabled:cursor-default disabled:font-bold disabled:text-xl';
    if ($error) {
        $style = $style.' select-error';
    }
@endphp

<div class="inline-block">
    @if ($label)
        <label class="" for={{$for}}>{{$label}}:</label>
    @endif
    
    <select 
        @disabled($disabled)
        {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => $style]) }}
    >
        {{ $slot }}
    </select>
</div>