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
            <figure class=" avatar pr-5 w-1/4 ">
                
                <div class="rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
    
                    @if ($user->avatar_path)
                        <img src="storage/{{$user->avatar_path}}" alt="default avatar">    
                    @else
                        <img src="storage/avatar/default_avatar.jpg" alt="default avatar">
                    @endif
                
                </div>
            
            </figure>
            <div class="flex justify-between pl-5 w-full">

                <x-input.form-control class="w-3/4 pr-2" :error="$errors->first('user.name')" label='Név*'>
                    <x-input.text :readonly='$readonly' class=" disabled:cursor-default" wire:model.debounce='user.name'/> 
                </x-input.form-control>

                <div class="flex flex-col w-1/4 mx-auto text-center">
                    <label for="isleader" class="label-text p-2 w-full"> Vezető Beosztás</label>
                    <x-button.toggle wire:model.debounce="property.isleader" class=" toggle-primary toggle-md mt-3 mx-auto"/>
                </div>

            </div>
        </div>
        <div class="flex">
            <x-input.form-control class="w-3/4 pl-2" :error="$errors->first('user.email')" label='Email*'>
                <x-input.text :readonly='$readonly' class=" disabled:cursor-default" wire:model.debounce='user.email'/> 
            </x-input.form-control>

            <x-input.form-control class="w-1/4 pl-5" :error="$errors->first('property.department')" label='Részleg*'>
               
                <x-select wire:model="property.department" >

                    <option selected >Válasszon</option>
                    @foreach (\App\Enum\Department::cases() as $department)
                        <option value={{$department}}>{{$department}}</option>
                    @endforeach

                </x-select>

            </x-input.form-control>
        </div>

        <div class="flex justify-between">

            <x-input.form-control class="w-full mr-5" :error="$errors->first('property.place_of_birth')" label='Születési hely*'>
                <x-input.text wire:model.debounce='property.place_of_birth'  />
            </x-input.form-control>

            <x-input.form-control  class="w-full ml-5" :error="$errors->first('property.date_of_birth')" label='Születési idő*'>
                <x-input.date wire:model=property.date_of_birth/>
            </x-input.form-control>
        
        </div>

        <div class="flex justify-between">
            <div class="w-2/3">
                @livewire('modals.new-user-form.file-upload-controller')
            </div>

            <x-input.form-control class="w-1/3 ml-5" :error="$errors->first('property.entry_card')" label='Belépő kártya száma*'>
                <x-input.text placeholder="pl.:123456" wire:model.debounce='property.entry_card' />
            </x-input.form-control>

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
