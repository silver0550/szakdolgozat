<div>
    <x-modals.body class="flex flex-col mx-10">
        <div class="flex">
            <div class="w-1/4 min-w-[200px] h-[200px] m-5 ml-0">
                @livewire('modals.user-form.avatar-controller',['user' => $user])
            </div>
            <div class="flex flex-col justify-center w-full">

                <div class="flex justify-between pl-5 ">
                    <x-input.form-control class="w-3/5 pr-2" :error="$errors->first('user.name')" label='Név*'>
                        <x-input.text :readonly='$readonly' wire:model.lazy='user.name'/>
                    </x-input.form-control>
                </div>

                <div class="flex justify-between pl-5 w-full">

                    <x-input.form-control class=" w-3/5" :error="$errors->first('user.email')" label='Email*'>
                        <x-input.text :readonly='$readonly'  wire:model.lazy='user.email'/>
                    </x-input.form-control>

                    <x-input.form-control class="w-2/5 pl-5" :error="$errors->first('property.department')" label='Részleg*'>

                        <x-selector :disabled='$readonly'  wire:model.lazy="property.department" >
                            <option selected>Válasszon</option>
                            @foreach (\App\Enum\Department::cases() as $department)
                                <option value={{$department}}>{{$department}}</option>
                            @endforeach

                        </x-selector>

                    </x-input.form-control>

                </div>

            </div>
        </div>

        <div class="flex justify-between">

            <x-input.form-control class="w-full mr-5" :error="$errors->first('property.place_of_birth')" label='Születési hely*'>
                <x-input.text :disabled='$readonly' wire:model.lazy='property.place_of_birth'  />
            </x-input.form-control>

            <x-input.form-control  class="w-full ml-5" :error="$errors->first('property.date_of_birth')" label='Születési idő*'>
                <x-input.date  :disabled='$readonly' wire:model.lazy=property.date_of_birth/>
            </x-input.form-control>

            <x-input.form-control class="w-full ml-5" :error="$errors->first('property.entry_card')" label='Belépő kártya száma*'>
                <x-input.text :disabled='$readonly'  placeholder="pl.:123456" wire:model.lazy='property.entry_card' />
            </x-input.form-control>
        </div>

        <div class="flex justify-center">
            <div class="w-1/2 mr-2">
                @livewire('modals.user-form.language-controller',['languages' => $property->language_knowledge])
            </div>
            <div class="w-1/2 ml-2 bg-base-100">
                livewire tools controll
            </div>
        </div>

    </x-modals.body>
    <x-modals.control>
        @role('system|admin')
            <x-button.primary wire:click="{{$target}}" class="btn-sm">Mentés</x-button.primary>
        @endrole
    </x-modals.control>
</div>
