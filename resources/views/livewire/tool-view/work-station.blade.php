<div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('work_station.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.lazy='data.serial_number'/>
        </x-input.form-control>
        <x-input.form-control
            class="w-3/6"
            label="{{ __('work_station.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('work_station.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.lazy='data.model_type'/>
        </x-input.form-control>
        <x-input.form-control
            class="w-3/6"
            label="{{ __('work_station.description') }}"
            :error="$errors->first('description')" >
            <x-input.text wire:model.lazy='data.description'/>
        </x-input.form-control>
    </div>
</div>
