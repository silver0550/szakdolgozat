<div>
    <div class="flex">
        <x-input.form-control
            class="columns-1 w-2/6 mr-4"
            label="{{ __('phone.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.defer='data.serial_number'/>
        </x-input.form-control>

        <x-input.form-control
            class="columns-2 w-2/6 mr-4"
            label="{{ __('phone.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.defer='data.manufacturer'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-3 w-2/6"
            label="{{ __('phone.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.defer='data.model_type'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
                class="w-full"
                label="{{ __('phone.description') }}"
                :error="$errors->first('description')" >
                <x-input.text wire:model.defer='data.description'/>
        </x-input.form-control>
    </div>
</div>
