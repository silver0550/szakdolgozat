<div>
    <div class="flex">
        <x-input.form-control
            class="columns-1 w-2/6 mr-4"
            label="{{ __('tablet.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.lazy='data.serial_number'/>
        </x-input.form-control>

        <x-input.form-control
            class="columns-2 w-2/6 mr-4"
            label="{{ __('tablet.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-3 w-2/6"
            label="{{ __('tablet.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.lazy='data.model_type'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-full"
            label="{{ __('tablet.description') }}"
            :error="$errors->first('description')" >
            <x-input.text wire:model.lazy='data.description'/>
        </x-input.form-control>
    </div>
    <div class="flex w-2/6 justify-between">
        <x-selector wire:model="data.display_size"
                    label="{{ __('tablet.display_size') }}"
                    :error="$errors->first('display_size')" >
            <option selected value="{{null}}">{{ __('global.select') }}</option>
            @foreach(\App\Enum\Tools\Tablet\DisplaySizeEnum::cases() as $size)
                <option value={{$size}}>{{ $size->getReadableText() }}</option>
            @endforeach
        </x-selector>
        <x-selector wire:model="data.color"
                    label="{{ __('tablet.color') }}"
                    :error="$errors->first('color')" >
            <option selected value="{{null}}">{{ __('global.select') }}</option>
            @foreach(\App\Enum\ColorEnum::cases() as $color)
                <option value={{$color}}>{{ $color->getReadableText() }}</option>
            @endforeach
        </x-selector>
    </div>
</div>
