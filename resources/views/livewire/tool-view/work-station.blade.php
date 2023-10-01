<div>
    <div class="flex">
        <x-input.form-control
            class="columns-1 w-2/6 mr-4"
            label="{{ __('notebook.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.serial_number'/>
        </x-input.form-control>

        <x-input.form-control
            class="columns-2 w-2/6 mr-4"
            label="{{ __('notebook.manufacturer') }}"
            :error="$errors->first('manufacturer')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.manufacturer'/>
        </x-input.form-control>
        <x-input.form-control
            class="columns-3 w-2/6"
            label="{{ __('notebook.model_type') }}"
            :error="$errors->first('model_type')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.model_type'/>
        </x-input.form-control>
    </div>
    <div class="flex">
        <x-input.form-control
            class="w-full"
            label="{{ __('notebook.description') }}"
            :error="$errors->first('description')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.description'/>
        </x-input.form-control>
    </div>
</div>
