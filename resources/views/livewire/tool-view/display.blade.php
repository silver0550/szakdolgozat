<div>
    <div class="flex">
        <x-input.form-control
            class="columns-1 w-2/6 mr-4"
            label="{{ __('display.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.lazy='data.serial_number'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-2 w-2/6 mr-4"
            label="{{ __('display.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-3 w-2/6"
            label="{{ __('display.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.lazy='data.model_type'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-full"
            label="{{ __('display.description') }}"
            :error="$errors->first('description')" >
            <x-input.text wire:model.lazy='data.description'/>
        </x-input.form-control>
    </div>
    <div class="flex justify-between w-3/6">
        <x-selector
            wire:model="data.size"
            label="{{ __('display.size') }}"
            :error="$errors->first('size')">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\Tools\Display\SizeEnum::cases() as $size)
                <option value={{$size}}>{{ $size->getReadableText() }}</option>
            @endforeach
        </x-selector>
        <x-selector
            class="ml-10"
            wire:model="data.resolution"
            label="{{ __('display.resolution') }}"
            :error="$errors->first('resolution')">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\Tools\Display\ResolutionEnum::cases() as $resolution)
                <option value={{$resolution}}>{{ $resolution->getReadableText() }}</option>
            @endforeach
        </x-selector>
        <div class="flex items-center pt-6">
            <label for="toggle" class="label">
                <span class="label-text">{{ __('display.is_flexible') }}:</span>
            </label>
            <x-button.toggle class="ml-2"
                wire:model="data.is_flexible"/>
        </div>
    </div>
</div>
