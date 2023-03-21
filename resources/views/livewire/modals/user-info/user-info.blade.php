<div class="bg-base-200 text-base-800">
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.info/>
        </x-slot>
        <x-slot name='label'>
            {{$label}}
        </x-slot>
    </x-modals.header>

    
    <x-modals.body class="flex flex-col mx-10">
        <div class="flex">
            <div class="w-1/4 m-auto mt-5">
            @livewire('modals.user-info.avatar-controller',['user' => $user])
        </div>
            <div class="flex flex-col justify-center w-full">

                <div class="flex justify-between pl-5 ">
                    <x-input.form-control class="w-3/5 pr-2" :error="$errors->first('user.name')" label='Név*'>
                        <x-input.text :readonly='$readonly' wire:model.debounce='user.name'/> 
                    </x-input.form-control>

                    <div class="flex flex-col w-2/5 mx-auto text-center">
                        <label for="isleader" class="label-text p-2 w-full"> Vezető Beosztás</label>
                        <x-button.toggle  :disabled='$readonly' wire:model.debounce="property.isleader" class=" toggle-primary toggle-md mt-3 mx-auto"/>
                    </div>
                </div>

                <div class="flex justify-between pl-5 w-full">

                    <x-input.form-control class=" w-3/5" :error="$errors->first('user.email')" label='Email*'>
                        <x-input.text :readonly='$readonly'  wire:model.debounce='user.email'/> 
                    </x-input.form-control>

                    <x-input.form-control class="w-2/5 pl-5" :error="$errors->first('property.department')" label='Részleg*'>
               
                        <x-select :disabled='$readonly'  wire:model.debounce="property.department" >
        
                            @foreach (\App\Enum\Department::cases() as $department)
                                <option value={{$department}}>{{$department}}</option>
                            @endforeach
        
                        </x-select>
        
                    </x-input.form-control>
                
                </div>  
            
            </div>
        </div>

        <div class="flex justify-between">

            <x-input.form-control class="w-full mr-5" :error="$errors->first('property.place_of_birth')" label='Születési hely*'>
                <x-input.text :disabled='$readonly' wire:model.debounce='property.place_of_birth'  />
            </x-input.form-control>

            <x-input.form-control  class="w-full ml-5" :error="$errors->first('property.date_of_birth')" label='Születési idő*'>
                <x-input.date  :disabled='$readonly'  wire:model=property.date_of_birth/>
            </x-input.form-control>
        
            <x-input.form-control class="w-full ml-5" :error="$errors->first('property.entry_card')" label='Belépő kártya száma*'>
                <x-input.text :disabled='$readonly'  placeholder="pl.:123456" wire:model.debounce='property.entry_card' />
            </x-input.form-control>
        </div>

        <div class="flex justify-between">
            {{-- <div class="w-2/3">
                @livewire('modals.new-user-form.file-upload-controller')
            </div> --}}

            

        </div>

        <div class="flex justify-center">

            @livewire('modals.new-user-form.language-controller')
        
        </div>

    </x-modals.body>
    <x-modals.control>
        @can('update', $user)
            <x-button.primary wire:click="update" class="btn-sm">Mentés</x-button.primary>
        @endcan
    </x-modals.control>

</div>
