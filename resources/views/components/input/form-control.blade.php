@props([
    'for' => '',
    'label' => '',
    'error' => false,
])

<div {{$attributes ->merge(['class' => 'form-control'])}}>
    @if ($label)
        <label for="{{$for}}" class="label">
            <span class="label-text">
                {{$label}}
            </span>
        </label>
    @endif
    {{ $slot }}
    @if ($error)
        <label class="label">
            <span class="label-text-alt text-error">
                {{$error}}
            </span>
        </label>
    @endif

</div>