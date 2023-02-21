@props([
    'label' => '',
    'error' => false,
])
    
<div class="form-control">
    <label class="input-group">
        <span>{{$label}}</span>
        {{ $slot }}
    </label>
</div>