@props([
    'isActive' => false,
])

<input @checked($isActive) type="checkbox" class="modal-toggle" />
<div class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        {{ $slot }}
    </div>
</div>
