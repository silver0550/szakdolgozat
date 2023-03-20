<div class="bg-base-200 text-base-800">
    
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.people/>
        </x-slot>
        <x-slot name='label'>
            <span>Új felhasználó</span>
        </x-slot>
    </x-modals.header>

    <x-modals.body class="flex flex-col ">

        <div class="flex justify-between px-10">

            <x-input.form-control class="w-full mr-5" :error="$errors->first('user.name')" label='Név*'>
                <x-input.text wire:model.debounce='user.name'  />
            </x-input.form-control>

            <div class="flex flex-col w-1/4 mx-auto text-center">
                <label for="isleader" class="label-text"> Vezető Beosztás</label>
                <x-button.toggle wire:model.debounce="property.isleader" class=" toggle-primary toggle-md m-auto"/>
            </div>
        
        </div>

        <div class="flex justify-between px-10">

            <x-input.form-control class="w-full mr-5" :error="$errors->first('user.email')" label='Email*'>
                <x-input.text wire:model.debounce='user.email' />
            </x-input.form-control>

            <x-input.form-control class="w-1/4" :error="$errors->first('property.department')" label='Részleg*'>
               
                <x-select wire:model="property.department" >

                    <option selected >Válasszon</option>
                    @foreach (\App\Enum\Department::cases() as $department)
                        <option value={{$department}}>{{$department}}</option>
                    @endforeach

                </x-select>

            </x-input.form-control>

        </div>

        <div class="flex justify-between px-10">

            <x-input.form-control class="w-full mr-5" :error="$errors->first('property.place_of_birth')" label='Születési hely*'>
                <x-input.text wire:model.debounce='property.place_of_birth'  />
            </x-input.form-control>

            <x-input.form-control  class="w-full ml-5" :error="$errors->first('property.date_of_birth')" label='Születési idő*'>
                <x-input.date wire:model=property.date_of_birth/>
            </x-input.form-control>
        
        </div>

        <div class="flex justify-between px-10 ">
            <div class="w-2/3">
                @livewire('modals.new-user-form.file-upload-controller')
            </div>

            <x-input.form-control class="w-1/3 ml-5" :error="$errors->first('property.entry_card')" label='Belépő kártya száma*'>
                <x-input.text placeholder="pl.:123456" wire:model.debounce='property.entry_card' />
            </x-input.form-control>

        </div>

        <div class="flex justify-center px-10 ">

            @livewire('modals.new-user-form.language-controller')
        
        </div>

    </x-modals.body>

    <x-modals.control>
        <x-button.primary wire:click="save" class="btn-sm mr-3">Mentés</x-button.primary>

        <x-button.primary wire:click="$emit('closeModal')" class="btn-sm">Mégsem</x-button.primary>
    </x-modals.control>
</div>   
