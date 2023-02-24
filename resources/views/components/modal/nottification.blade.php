@props([
  'isActive' => false,
  'exitEvent' => false,
  ])
<input @checked($isActive) type="checkbox" class="modal modal-toggle " />

<label 
    
    @if ($exitEvent)
        wire:click="$emitSelf('{{$exitEvent}}')"
    @endif    
    class="modal cursor-pointer"
>
    <label {{ $attributes->merge(['class' => 'modal-box relative text-center']) }}>
        <h3 class="text-lg font-bold">
            {{$label}}

        </h3>
        <p class="py-4">
            {{ $body }}
        </p>
        
    </label>
</label>