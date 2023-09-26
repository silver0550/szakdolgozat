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
        <x-selector wire:model="data.is_colorful"
                    label="{{ __('printer.is_colorful') }}">
            <option selected value="{{false}}">{{ __('global.no') }}</option>
            <option value={{true}}>{{ __('global.yes') }}</option>
        </x-selector>
        <x-selector wire:model="data.type"
                    label="{{ __('printer.type') }}">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\Tools\Printer\TypeEnum::cases() as $type)
                <option value={{$type}}>{{ $type->getReadableText() }}</option>
            @endforeach
        </x-selector>
    </div>
</div>
