<div>
    <x-modals.body class="flex flex-col mx-10">
        <div class="flex mb-2">
            <ul class="menu menu-horizontal menu-lg bg-base-200 rounded-box">
                @foreach(\App\Models\Tool::getTypes() as $model)
                    <li wire:click="$set('classType','{{addslashes($model)}}')">
                        <img class="h-20 @if($classType == $model) active @endif"
                             src="{{ (new $model)->img }}" alt="Tool">
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex cursor-default text-2xl py-2 pl-3 font-bold  ">
            <div class="inline-block pl-3">{{ (new $classType)->myName }} hozzáadása</div>
        </div>
        <hr>
        <div class="pt-5 ">
            @switch($classType)
                @case(\App\Models\Phone::class)
                    @livewire('tool-view.' . $classType::LANG)
                    @break
                @case(\App\Models\Notebook::class)
                    @livewire('tool-view.' . $classType::LANG)
                    @break
                @case(\App\Models\Display::class)
                    @livewire('tool-view.' . $classType::LANG)
                    @break
{{--                @case(\App\Models\Printer::class)--}}
{{--                    @livewire('tool-view.' . $classType::LANG)--}}
{{--                    @break--}}
{{--                @case(\App\Models\SimCard::class)--}}
{{--                    @livewire('tool-view.' . $classType::LANG)--}}
{{--                    @break--}}
{{--                @case(\App\Models\Tablet::class)--}}
{{--                    @livewire('tool-view.' . $classType::LANG)--}}
{{--                    @break--}}
{{--                @case(\App\Models\WorkStation::class)--}}
{{--                    @livewire('tool-view.' . $classType::LANG)--}}
{{--                    @break--}}
            @endswitch
{{--            @foreach ($classType::getInputFields() as $index =>$input)--}}
{{--                @if($index %2 == 0)--}}
{{--                    <div class="flex justify-between pl-5 ">--}}
{{--                @endif--}}
{{--                <x-input.form-control--}}
{{--                    class="w-3/5 pr-3"--}}
{{--                    label="{{ __($classType::LANG . '.' . $input) }}"--}}
{{--                    :error="$errors->first($input)" >--}}
{{--                        <x-input.text wire:model.lazy='modelData.{{$input}}'/>--}}
{{--                </x-input.form-control>--}}
{{--                @if($index %2 != 0)--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endforeach--}}
        </div>
    </x-modals.body>
    <x-modals.control>
        <x-button.primary :disabled="!$classType" wire:click="store">Mentés</x-button.primary>
    </x-modals.control>
</div>
