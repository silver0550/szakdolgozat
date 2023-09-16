@props([
    'disabled' => false,
])

<button
    {{ $attributes->merge(['class' => 'btn btn-primary']) }}
    @disabled($disabled)>
    {{ $slot }}
</button>
