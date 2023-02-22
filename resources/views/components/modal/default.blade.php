@props([
    'for' => 'my-modal',
    'label' => '',
])

<label {{ $attributes->merge([ 'class' => 'btn btn-primary'])}} for="{{$for}}" >{{ $label }}</label>

<input type="checkbox" id="{{ $for }}" class="modal-toggle" />
<div class="modal">
    <div class="modal-box w-11/12 max-w-5xl">

        {{ $slot }}
    
    </div>
</div>