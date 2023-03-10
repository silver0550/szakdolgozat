<div class="bg-base-200 text-base-800">
    
    <x-modals.header>
        <x-slot name='icon'>
            <x-icon.people/>
        </x-slot>
        <x-slot name='label'>
            <span>Új felhasználó</span>
        </x-slot>
    </x-modals.header>

    <x-modals.body class="flex flex-col text-center">

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

            <x-input.form-control class="w-full mr-5" :error="$errors->first('property.place_of_birt')" label='Születési hely*'>
                <x-input.text wire:model.debounce='property.place_of_birt'  />
            </x-input.form-control>

            <x-input.form-control  class="w-full ml-5" :error="$errors->first('property.date_of_birt')" label='Születési idő*'>
                <x-input.date wire:model=property.date_of_birt/>
            </x-input.form-control>
        
        </div>

        <div class="flex justify-between px-10">

            <div class="flex w-1/2 mr-5">

                <x-input.form-control class=" w-3/4" :error="$errors->first('avatar')" label='Avatár'>
                    <input wire:click="$set('avatar','')" wire:model='avatar' type="file" class="file-input file-input-sm file-input-bordered file-input-primary w-full max-w-xs " />
                </x-input.form-control>

                @if ($avatar && !$errors->first('avatar'))

                    <div class="avatar flex w-1/4 justify-end my-auto">
                        <div class="w-20 h-20 rounded-xl">
                            <img src="{{$avatar->temporaryUrl()}}" alt="Avatar preview">
                        </div>
                    </div>

                @endif

            </div>

            <x-input.form-control class="w-1/2 ml-5" :error="$errors->first('property.entry_card')" label='Belépő kártya száma*'>
                <x-input.text placeholder="pl.:123456" wire:model.debounce='property.entry_card' />
            </x-input.form-control>

        </div>

        <div class="flex justify-center w-1/2 px-10 ">

            <x-input.form-control class="w-full justify-center" :error="$errors->first('languageBuilder.*')" label='Beszélt nyelvek'>
                
                @if($language_knowledge)
                    @foreach ($language_knowledge as $language => $level)
                        <div class="flex w-1/2 justify-between my-1">
                            <label class="label-text">{{$language}}</label>
                            <label class="label-text">{{$level}}</label>
                            <x-button.primary wire:click="removeLanguage('{{$language}}')" class="btn-ghost btn-xs">X</x-button.primary>
                        </div>
                    @endforeach
                @else
                    <label class="my-1 label-text">Nincs beszélt nyelv</label>
                @endif
                
                <div class="flex justify-between w-full mt-2" >

                    <x-select wire:model="languageBuilder.language" class="select-sm w-max">
                        <option selected >Válasszon</option>
                        @foreach (\App\Enum\LanguageKnowledge::cases() as $language)
                            <option value={{$language}}>{{$language}}</option>
                        @endforeach
                    </x-select>

                    <x-select  wire:model="languageBuilder.level" class="select-sm w-max">
                        <option selected >Válasszon</option>
                        @foreach (\App\Enum\LanguageKnowledge::getLevels() as $level)
                            <option value={{$level}}>{{$level}}</option>
                        @endforeach
                    </x-select>

                    <x-button.primary wire:click="addLanguage" class="btn-xs my-auto w-max" >Hozzáad</x-button.primary>
                
                </div>

            </x-input.form-control>
        
        </div>

    </x-modals.body>

    <x-modals.control>
        <x-button.primary wire:click="save" class="btn-sm mr-3">Mentés</x-button.primary>

        <x-button.primary wire:click="$emit('closeModal')" class="btn-sm">Mégsem</x-button.primary>
    </x-modals.control>
    {{-- @if($errors->any())
        {{$errors->first('languageBuilder.*')}}
    @endif --}}
</div>   
