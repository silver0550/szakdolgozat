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
    <div class="flex w-2/6 justify-between">
        <div class="flex items-center pt-6">
            <label for="toggle" class="label">
                <span class="label-text">{{ __('printer.is_colorful') }}</span>
            </label>
            <x-button.toggle class="ml-2" wire:model="data.is_colorful"/>
        </div>
        <x-selector wire:model="data.type"
                    label="{{ __('printer.type') }}"
                    :error="$errors->first('type')">
            <option selected value="{{null}}">{{ __('global.select') }}</option>
            @foreach(\App\Enum\Tools\Printer\TypeEnum::cases() as $type)
                <option value={{$type}}>{{ $type->getReadableText() }}</option>
            @endforeach
        </x-selector>
    </div>
</div>
