@props([
  'isActive' => false,
  ])

<input @checked($isActive) type="checkbox" class="modal modal-toggle " />
<label wire:click={{$attributes['wire:click']}} class="modal cursor-pointer">
    <label {{ $attributes->merge(['class' => 'modal-box relative text-center']) }}>
        <h3 class="text-lg font-bold">Sikeres művelet!</h3>
        <p class="py-4">
            {{ $slot }}
        </p>
        
    </label>
</label>