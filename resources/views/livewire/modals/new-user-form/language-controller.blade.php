<div class="bg-base-100 w-full p-3 rounded-xl">
    
    <div class="flex justify-between ">

        <div class="flex flex-col w-1/3">

            <div class="relative -top-3 pl-2"><label class="label-text">Beszélt nyelvek</label></div>
            <div class="flex justify-around ">
                <x-select wire:model="language" class="select-sm">
                    <option selected >Nyelv</option>
                    @foreach (\App\Enum\LanguageKnowledge::cases() as $language)
                        <option value={{$language}}>{{$language}}</option>
                    @endforeach
                </x-select>

                <x-select  wire:model="level" class="select-sm">
                    <option selected >Szint</option>
                    @foreach (\App\Enum\LanguageKnowledge::getLevels() as $level)
                        <option value={{$level}}>{{$level}}</option>
                    @endforeach
                </x-select>

                <x-button.primary wire:click="addLanguage" class="btn-xs my-auto" >Hozzáad</x-button.primary>
                
            </div>

        </div>

        <div class=" w-1/2"> 
            <div class="flex flex-wrap">  
                @foreach ($languages as $language => $level)
                    <div class="badge badge-primary mt-2 mr-2">
                        <span wire:click="removeLanguage('{{$language}}')" class=" text-xs pr-2 cursor-pointer hover:text-base-200 ">X</span>
                        {{$language}} {{$level}}
                    </div>
                   
                @endforeach
            </div>
        </div>
    </div>
</div>