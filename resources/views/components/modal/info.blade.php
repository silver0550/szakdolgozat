@props([
  'isActive' => false,
  ])

<input @checked($isActive) type="checkbox" id="my-modal-4" class="modal modal-toggle " />
<label wire:click={{$attributes['wire:click']}} class="modal cursor-pointer">
    <label {{ $attributes->whereDoesntStartWith('wire:key')->merge(['class' => 'modal-box relative text-center']) }}>
        {{ $slot }}
    </label>
</label>