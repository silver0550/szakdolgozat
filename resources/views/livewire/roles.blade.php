<div>
    @if($title)
        <x-title label="{{ $title }}"/>
    @endif
    <x-card>
        <x-row>
            <div class="ml-4 mb-4 w-1/2">
                <x-selector
                    :label="__('permissions.user')"
                    wire:model="userId">
                    <option selected value= {{null}} >{{ __('global.select') }}</option>
                    @foreach (\App\Models\User::all() as $user)
                        <option value={{ $user->id }}>{{ $user->name }}</option>
                    @endforeach
                </x-selector>
            </div>
            <div class="ml-4 mb-4 w-1/2">
                <x-selector
                    wire:model="role"
                    :label=" __('permissions.role') "
                    :disabled="($userId ? false : true)
                                || !user()->hasPermissionTo('set-permission')">
                    @if(!$role)
                        <option selected > - </option>
                    @endif
                    @foreach (\Spatie\Permission\Models\Role::all()->pluck('name') as $roleItem)
                        <option {{ $roleItem == $role ? 'selected' : '' }}
                                value={{ $roleItem }}>
                                    {{ __('permissions.' . lineLifter($roleItem, false)) }}
                        </option>
                    @endforeach
                </x-selector>
            </div>
        </x-row>
    </x-card>
    <x-card class="my-3 ">
        <x-row class="flex-wrap">
        @foreach($permissions as $key => $permission)
                <div class="w-1/3">
                    <x-input.checkbox
                        wire:model="permissions.{{ $key }}"
                        :label="__('permissions.' . lineLifter($key,false))"
                        :disabled="$this->belongsToRole($key)
                                    || ($userId ? false : true)
                                    || !user()->hasPermissionTo('set-permission')"/>
                </div>
        @endforeach
        </x-row>
        @can('set-permission')
            <x-row class="py-3 justify-end w-11/12 ">
                <x-button.primary class="btn-sm"
                    wire:click="store"
                    :disabled="$userId ? false : true">
                    {{ __('global.save') }}
                </x-button.primary>
            </x-row>
        @endcan
    </x-card>
</div>
