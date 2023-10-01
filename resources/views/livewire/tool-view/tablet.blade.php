<div>
    <div class="flex">
        <x-input.form-control
            class="columns-1 w-2/6 mr-4"
            label="{{ __('tablet.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text :readonly="$readOnly" wire:model.lazy='data.serial_number'/>
        </x-input.form-control>

        <x-input.form-control
            class="columns-2 w-2/6 mr-4"
            label="{{ __('tablet.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text :readonly="$readOnly" wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-3 w-2/6"
            label="{{ __('tablet.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text :readonly="$readOnly" wire:model.lazy='data.model_type'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-full"
            label="{{ __('tablet.description') }}"
            :error="$errors->first('description')" >
            <x-input.text :readonly="$readOnly" wire:model.lazy='data.description'/>
        </x-input.form-control>
    </div>
    <div class="flex w-2/6 justify-between">
        <x-selector wire:model.defer="data.display_size"
                    label="{{ __('tablet.display_size') }}"
                    :error="$errors->first('display_size')"
                    :disabled="$readOnly">
            @if(!array_key_exists('display_size', $data))
                <option selected value="{{null}}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\Tools\Tablet\DisplaySizeEnum::cases() as $size)
                <option {{ array_key_exists('display_size', $data) && $data['display_size'] == $size
                        ? 'selected'
                        : '' }}
                    value={{$size}}>
                    {{ $size->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
        <x-selector wire:model.defer="data.color"
                    label="{{ __('tablet.color') }}"
                    :error="$errors->first('color')"
                    :disabled="$readOnly">
            @if(!array_key_exists('color', $data))
                <option selected value="{{null}}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\ColorEnum::cases() as $color)
                <option {{ array_key_exists('color', $data) && $data['color'] == $color
                        ? 'selected'
                        : '' }}
                    value={{$color}}>
                    {{ $color->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
    </div>
</div>
