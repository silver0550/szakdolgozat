@props([
    'label' => false
])


<div class="indicator ">
    @if($label)
        <span class="indicator-item badge badge-primary cursor-default top-3">{{$label}}</span>
    @endif
        {{ $slot }}
</div>