<div>
    <div class="flex">
        <x-input.form-control
            class="columns-1 w-2/6 mr-4"
            label="{{ __('display.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.serial_number'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-2 w-2/6 mr-4"
            label="{{ __('display.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.manufacturer'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-3 w-2/6"
            label="{{ __('display.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.model_type'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-full"
            label="{{ __('display.description') }}"
            :error="$errors->first('description')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.description'/>
        </x-input.form-control>
    </div>
    <div class="flex justify-between w-3/6">
        <x-selector
            wire:model.defer="data.size"
            label="{{ __('display.size') }}"
            :error="$errors->first('size')"
            :disabled="$readOnly">
            @if(!array_key_exists('size', $data))
                <option selected value="{{null}}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\Tools\Display\SizeEnum::cases() as $size)
                <option {{ array_key_exists('size', $data) && $data['size'] == $size
                        ? 'selected'
                        : '' }}
                    value={{ $size }}>
                    {{ $size->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
        <x-selector
            class="ml-10"
            wire:model.defer="data.resolution"
            label="{{ __('display.resolution') }}"
            :error="$errors->first('resolution')"
            :disabled="$readOnly">
            @if(!array_key_exists('resolution', $data))
                <option selected value="{{null}}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\Tools\Display\ResolutionEnum::cases() as $resolution)
                <option
                    {{ array_key_exists('resolution', $data) && $data['resolution'] == $resolution->value
                        ? 'selected'
                        : '' }}
                    value={{ $resolution }}>
                    {{ $resolution->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
        <div class="flex items-center pt-6">
            <label for="toggle" class="label">
                <span class="label-text">{{ __('display.is_flexible') }}:</span>
            </label>
            <x-button.toggle class="ml-2"
                wire:model.defer="data.is_flexible"
                :disabled="$readOnly"/>
        </div>
    </div>
</div>
