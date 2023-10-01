@props([
    'for' => '',
    'label' => '',
    'disabled' => false,
    'checked' => false,
])


<div {{ $attributes ->merge(['class' => 'form-control']) }}>
    <label class="label justify-normal cursor-pointer">
        <input type="checkbox"
               class="checkbox checkbox-primary"
               {{ $checked ? 'checked="checked"' : ''}}
               @disabled($disabled)/>
        <span class="label-text pl-3">{{ $label }}</span>
    </label>
</div>
