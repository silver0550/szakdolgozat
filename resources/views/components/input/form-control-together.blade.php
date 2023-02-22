@props([
    'label' => '',
    'error' => false,
])
    
<div {{$attributes->merge(['class' => 'form-control'])}}>
    <label class="input-group">

        <span class="w-24">{{$label}}</span>
        {{ $slot }}
    </label>
    <label class="label h-5"> 
        @if ($error)
            <span class="label-text-alt text-error relative top-1 left-20">
                {{$error}}
            </span>
        @endif
    </label>
    
</div>

