@props([
    'label' => '',
    'error' => false,
])
    
<div {{$attributes->merge(['class' => 'form-control'])}}>
    <label class="input-group">
        <span>{{$label}}</span>
        {{ $slot }}
    </label>
</div>