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
    <div class="flex w-2/6 justify-between">
        <div class="flex items-center pt-6">
            <label for="toggle" class="label">
                <span class="label-text">{{ __('printer.is_colorful') }}</span>
            </label>
            <x-button.toggle class="ml-2"
                             wire:model.defer="data.is_colorful"
                             :disabled="$readOnly"/>
        </div>
        <x-selector wire:model.defer="data.type"
                    label="{{ __('printer.type') }}"
                    :error="$errors->first('type')"
                    :disabled="$readOnly">
            @if(!array_key_exists('type', $data))
                <option selected value="{{null}}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\Tools\Printer\TypeEnum::cases() as $type)
                <option {{ array_key_exists('type', $data) && $data['type'] == $type->value
                        ? 'selected'
                        : '' }}
                    value={{$type}}>
                    {{ $type->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
    </div>
</div>
