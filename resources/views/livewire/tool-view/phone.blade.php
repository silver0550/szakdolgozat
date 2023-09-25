<div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('phone.imei') }}"
            :error="$errors->first('imei')" >
            <x-input.text wire:model.lazy='data.imei'/>
        </x-input.form-control>

        <x-input.form-control
            class="w-3/6"
            label="{{ __('phone.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text wire:model.lazy='data.manufacturer'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('phone.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text wire:model.lazy='data.model_type'/>
        </x-input.form-control>
        <x-input.form-control
                class="w-3/6"
                label="{{ __('phone.description') }}"
                :error="$errors->first('description')" >
                <x-input.text wire:model.lazy='data.description'/>
            </x-input.form-control>
    </div>
</div>
