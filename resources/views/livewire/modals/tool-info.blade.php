<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.phone-link-round/>
        </x-slot>
        <x-slot name='label'>
            <span>Laptop</span>
        </x-slot>
    </x-modals.header>
    VAR1:{{$tool}}
    VAR2: {{$class}}
{{--    @livewire('modals.tool-form.tool-form', ['classId' => 1, 'classType' => 'App\Models\Display', 'readonly' => false])--}}
</div>
