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
                <span class="label-text capitalize font-bold">
                    {{ collect(\App\Models\User::find($userId)?->getRoleNames())->first() ?? '-' }}
                </span>
            </label>
        </x-input.form-control>
    </div>
    <div class="flex flex-wrap w-full px-2 py-6 bg-base-200 rounded-md mb-2 mt-5">
        @foreach(\Spatie\Permission\Models\Permission::all() as $index => $permission)
            @if($index %3 == 0)
                <div class="flex w-full mb-5">
            @endif
                <div class="w-1/3 pl-10">
                    <x-input.checkbox
                        :label="$permission->name"
                        :checked="\App\Models\User::find($userId)?->hasPermissionTo($permission->name)"
                    />
                </div>
            @if($index %3 == 2)
                </div>
            @endif
        @endforeach
        </div>
        <div class="flex justify-end w-11/12 ">
            <x-button.primary class="btn-sm">{{__('global.save')}}</x-button.primary>
        </div>
    </div>
</div>
