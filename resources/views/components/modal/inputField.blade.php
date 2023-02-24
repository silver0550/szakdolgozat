@props([
    'isActive' => false,
    'exitEvent' => false,
])

<input @checked($isActive) type="checkbox" class="modal-toggle" />
<div class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <label wire:click="$emit('{{$exitEvent}}')" class="btn btn-sm btn-circle h-10 w-10 absolute right-5 top-5">✕</label>
        {{$slot}}
    </div>
</div>
