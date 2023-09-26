<div>
    <div class="flex justify-between" >
        <x-input.form-control
            class="w-3/6 pr-3"
            label="{{ __('sim_card.serial_number') }}"
            :error="$errors->first('serial_number')" >
            <x-input.text wire:model.lazy='data.serial_number'/>
        </x-input.form-control>
        <x-selector wire:model="data.provider"
                    label="{{ __('sim_card.provider') }}">
            <option selected value="{{null}}">Nincs</option>
            @foreach(\App\Enum\Tools\SimCArd\ProviderEnum::cases() as $provider)
                <option value={{$provider}}>{{ $provider->getReadableText() }}</option>
            @endforeach
        </x-selector>
        <x-selector wire:model="data.size"
                    label="{{ __('sim_card.size') }}">
            <option selected value="{{ null }}">Nincs</option>
            @foreach(\App\Enum\Tools\SimCard\SizeEnum::cases() as $size)
                <option value={{$size}}>{{ $size->getReadableText() }}</option>
            @endforeach
        </x-selector>
    </div>
    <x-input.form-control
        label="{{ __('sim_card.description') }}"
        :error="$errors->first('description')" >
        <x-input.text wire:model.lazy='data.description'/>
    </x-input.form-control>
</div>
