<div>
    <x-modals.body class="flex flex-col mx-10">
        <x-row>
            <div class="w-1/4 min-w-[200px] h-[200px] m-5 ml-0">
                @livewire('modals.user-form.avatar-controller',['user' => $user])
            </div>
            <x-row class="flex-col justify-center w-full">
                <x-row class="justify-between pl-5">
                    <x-input.form-control
                        class="w-full pr-2"
                        :error="$errors->first('user.name')"
                        label="{{ __('user.name') }}"
                        required>
                        <x-input.text
                            :readonly='$readonly'
                            wire:model.lazy='user.name'/>
                    </x-input.form-control>
                </x-row>
                <x-row class="justify-between pl-5 w-full">
                    <x-input.form-control
                        class=" w-3/5"
                        :error="$errors->first('user.email')"
                        label="{{ __('user.email') }}"
                        required>
                        <x-input.text
                            :readonly='$readonly'
                            wire:model.lazy='user.email'/>
                    </x-input.form-control>
                    <x-input.form-control
                        class="w-2/5 pl-5"
                        :error="$errors->first('property.department')"
                        label="{{ __('user.department') }}"
                        required>
                        <x-selector
                            :disabled='$readonly'
                            wire:model.lazy="property.department"
                            :error="$errors->first('property.department')">
                            @if(is_null($property->department?->value))
                                <option disabled selected>{{ __('global.select') }}</option>
                            @endif
                            @foreach (\App\Enum\DepartmentEnum::cases() as $department)
                                <option {{ $property->department?->value == $department->value ? 'selected' : ''}}
                                        value={{ $department->value }}>{{ $department->getReadableText() }}</option>
                            @endforeach
                        </x-selector>
                    </x-input.form-control>
                </x-row>
            </x-row>
        </x-row>
        <x-row class="justify-between">
            <x-input.form-control
                class="w-full mr-5"
                :error="$errors->first('property.place_of_birth')"
                label="{{ __('user.place_of_birth') }}"
                required>
                <x-input.text
                    :disabled='$readonly'
                    wire:model.lazy='property.place_of_birth'/>
            </x-input.form-control>

            <x-input.form-control
                class="w-full ml-5"
                :error="$errors->first('property.date_of_birth')"
                label="{{ __('user.date_of_birth') }}"
                required>
                <x-input.date
                    :disabled='$readonly'
                    wire:model.lazy="property.date_of_birth"/>
            </x-input.form-control>

            <x-input.form-control
                class="w-full ml-5"
                :error="$errors->first('property.entry_card')"
                label="{{ __('user.card_number') }}"
                required>
                <x-input.text
                    :disabled='$readonly'
                    placeholder="pl.:123456"
                    wire:model.lazy='property.entry_card' />
            </x-input.form-control>
        </x-row>

        <x-row class="justify-center">
            <div class="w-1/2 mr-2">
                @livewire('modals.user-form.language-controller',['languages' => $property->language_knowledge])
            </div>
            <div class="w-1/2 ml-2 bg-base-100">
                <label class="label">
                    <span class="label-text ml-3">
                        Birtokolt eszközök
                    </span>
                </label>
                <x-row class="flex-wrap p-2">
                    @foreach($user->tools as $tool)
                        <div class="w-15 h-15 p-2">
                            <img
                                wire:click="$emit('openModal','modals.tool-info',
                                { tool: {{ $tool->id }} })"
                                class="w-15 h-10 cursor-pointer" src="{{ $tool->owner->img }}" alt="ToolImg"/>
                        </div>
                    @endforeach
                </x-row>
            </div>
        </x-row>
    </x-modals.body>
    <x-modals.control>
        @role('system|admin')
            <x-button.primary wire:click="{{ $target }}" class="btn-sm">{{ __('global.save') }}</x-button.primary>
        @endrole
    </x-modals.control>
</div>
