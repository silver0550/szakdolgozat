<div>
    <div class="flex justify-between w-full p-2 bg-base-200 rounded-md">
        <div class="ml-4 mb-4 w-1/2">
            <x-selector
                :label="'Felhasználó'"
                wire:model="userId">
                <option selected value="{{null}}">{{ __('global.select') }}</option>
                @foreach (\App\Models\User::all() as $user)
                    <option value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
            </x-selector>
        </div>
        <x-input.form-control class="w-1/2 pr-2" label='Szerepkör'>
            <label class="label" for="">
                <span class="label-text">
                    {{ collect(\App\Models\User::find($userId)?->getRoleNames())->first() ?? 'Nincs szerepkör kiosztva' }}
                </span>
            </label>
        </x-input.form-control>
    </div>
    <div class="flex justify-between w-full p-2 bg-base-200 rounded-md mb-2 mt-4 ">
        Valami
    </div>
</div>
