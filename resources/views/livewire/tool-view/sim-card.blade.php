<div>
    <div class="flex justify-between" >
        <x-input.form-control
            class="w-1/3 pr-3"
            label="{{ __('sim_card.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.serial_number'/>
        </x-input.form-control>
        <x-input.form-control
            class="w-1/4"
            label="{{ __('sim_card.call_number') }}"
            :error="$errors->first('call_number')" >
            <x-input.text :readonly="$readOnly" wire:model.defer='data.call_number'/>
        </x-input.form-control>
        <x-selector wire:model.defer="data.provider"
                    label="{{ __('sim_card.provider') }}"
                    :error="$errors->first('provider')"
                    :disabled="$readOnly">
            @if(!array_key_exists('size', $data))
                <option selected value="{{ null }}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\Tools\SimCArd\ProviderEnum::cases() as $provider)
                <option {{ array_key_exists('provider', $data) && $data['provider'] == $provider
                        ? 'selected'
                        : '' }}
                    value={{ $provider }}>
                    {{ $provider->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
        <x-selector wire:model.defer="data.size"
                    label="{{ __('sim_card.size') }}"
                    :error="$errors->first('size')"
                    :disabled="$readOnly">
            @if(!array_key_exists('size', $data))
                <option selected value="{{null}}">{{ __('global.select') }}</option>
            @endif
            @foreach(\App\Enum\Tools\SimCard\SizeEnum::cases() as $size)
                <option {{ array_key_exists('size', $data) && $data['size'] == $size
                        ? 'selected'
                        : '' }}
                    value={{$size}}>
                    {{ $size->getReadableText() }}
                </option>
            @endforeach
        </x-selector>
    </div>
    <x-input.form-control
        label="{{ __('sim_card.description') }}"
        :error="$errors->first('description')" >
        <x-input.text :readonly="$readOnly" wire:model.defer='data.description'/>
    </x-input.form-control>
</div>
