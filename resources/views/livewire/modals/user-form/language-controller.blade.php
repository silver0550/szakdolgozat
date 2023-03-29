<div class="bg-base-100 w-full p-3 rounded-xl">
    
        <div class="flex flex-col  mb-5">

            <div class="relative -top-3 pl-2"><label class="label-text">Beszélt nyelvek</label></div>
            
            <div class="flex flex-wrap my-auto min-h-[40px]">  

                @foreach ($languages as $language => $level)

                    <div class="badge badge-primary mt-2 mr-2">
                        
                            @can('update', auth()->user(), \App\Models\User::class)
                                <span wire:click="removeLanguage('{{$language}}')" class=" text-xs pr-2 cursor-pointer hover:text-base-200 ">X</span>
                            @endcan
                            
                        {{$language}} {{$level}}
                    </div>

                @endforeach

            </div>
            @can('update', auth()->user(), \App\Models\User::class)
                
                    <div class="flex w-full">
                        <div class="pr-5">
                            <x-selector wire:model="language" class="select-sm">
                                <option selected >Nyelv</option>
                                @foreach (\App\Enum\LanguageKnowledge::cases() as $language)
                                    <option value={{$language}}>{{$language}}</option>
                                @endforeach
                            </x-selector>
                        </div>
                        <div class="pr-5">
                            <x-selector  wire:model="level" class="select-sm">
                                <option selected >Szint</option>
                                @foreach (\App\Enum\LanguageKnowledge::getLevels() as $level)
                                    <option value={{$level}}>{{$level}}</option>
                                @endforeach
                            </x-selector>
                        </div>

                        <x-button.primary wire:click="addLanguage" class="btn-xs my-auto" >Hozzáad</x-button.primary>
                    
                    </div>
                
            @endcan
        </div>

</div>