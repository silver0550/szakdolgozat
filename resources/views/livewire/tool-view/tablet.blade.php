<div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('tablet.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.lazy='data.serial_number'/>
        </x-input.form-control>

        <x-input.form-control
            class="w-3/6"
            label="{{ __('tablet.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('tablet.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.lazy='data.model_type'/>
        </x-input.form-control>
        <x-input.form-control
            class="w-3/6"
            label="{{ __('tablet.description') }}"
            :error="$errors->first('description')" >
            <x-input.text wire:model.lazy='data.description'/>
        </x-input.form-control>
    </div>
    <div class="flex justify-around">
        <x-selector wire:model="data.display_size"
                    label="{{ __('tablet.display_size') }}">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\Tools\Tablet\DisplaySizeEnum::cases() as $size)
                <option value={{$size}}>{{ $size->getReadableText() }}</option>
            @endforeach
        </x-selector>
        <x-selector wire:model="data.color"
                    label="{{ __('tablet.color') }}">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\ColorEnum::cases() as $color)
                <option value={{$color}}>{{ $color->getReadableText() }}</option>
            @endforeach
        </x-selector>
    </div>
</div>
