<div>
    <x-modals.body class="flex flex-col mx-10">
        <div class="flex ">
            <ul class="menu menu-horizontal menu-lg bg-base-200 rounded-box">
                @foreach(\App\Models\Tool::getTypes() as $model)
                    <li wire:click="$set('classType','{{addslashes($model)}}')">
                        <img class="h-20 @if($classType == $model) active @endif"
                             src="{{ (new $model)->img }}" alt="Tool">
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex justify-between pl-5 ">
            @if ($classType)
                @foreach ($classType::getInputFields() as $input)
                    <x-input.form-control
                        class="w-3/5 pr-2"
                        label="{{ __($classType::LANG . '.' . $input) }}"
                        :error="$errors->first($input)" >
                            <x-input.text wire:model.lazy='modelData.{{$input}}'/>
                    </x-input.form-control>
                @endforeach
            @endif
        </div>
    </x-modals.body>
    <x-modals.control>
        <x-button.primary :disabled="!$classType" wire:click="store">Mentés</x-button.primary>
    </x-modals.control>
</div>
