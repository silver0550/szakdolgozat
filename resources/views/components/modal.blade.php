@props([
    'for' => 'my-modal',
    'label' => '',
])

<label {{ $attributes->merge([ 'class' => 'btn btn-primary'])}} for="{{$for}}" >{{ $label }}</label>

<input type="checkbox" id="{{ $for }}" class="modal-toggle" />
<div class="modal">
    {{ $slot }}
</div>