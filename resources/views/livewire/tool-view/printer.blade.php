<div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('printer.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.lazy='data.serial_number'/>
        </x-input.form-control>
        <x-input.form-control
            class="w-3/6"
            label="{{ __('printer.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('printer.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.lazy='data.model_type'/>
        </x-input.form-control>
        <x-input.form-control
            class="w-3/6"
            label="{{ __('printer.description') }}"
            :error="$errors->first('description')" >
            <x-input.text wire:model.lazy='data.description'/>
        </x-input.form-control>
    </div>
    <div class="flex justify-between">
        <div class="flex items-center pt-6">
            <label for="toggle" class="label">
                <span class="label-text">{{ __('printer.is_colorful') }}:</span>
            </label>
            <x-button.toggle class="ml-2" wire:model="data.is_colorful"/>
        </div>
        <x-selector wire:model="data.type"
                    label="{{ __('printer.type') }}">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\Tools\Printer\TypeEnum::cases() as $type)
                <option value={{$type}}>{{ $type->getReadableText() }}</option>
            @endforeach
        </x-selector>
    </div>
</div>
