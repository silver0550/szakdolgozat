<div class="bg-base-100 w-full p-3 rounded-xl">
    <div class="flex flex-col  mb-5">
        <div class="relative -top-3 pl-2"><label class="label-text">Beszélt nyelvek</label></div>
            <div class="flex flex-wrap my-auto min-h-[40px]">
                @foreach ($languages as $language => $level)
                    <div class="badge badge-primary mt-2 mr-2">
                        @can('edit-user')
                            <span
                                wire:click="removeLanguage('{{$language}}')"
                                class=" text-xs pr-2 cursor-pointer hover:text-base-200 ">
                                    X
                            </span>
                        @endcan
                        {{$language}} {{$level}}
                    </div>
                @endforeach
            </div>
            @can('edit-user')
                <div class="flex w-full">
                    <div class="pr-5">
                        <x-selector wire:model="lang" class="select-sm">
                            <option selected>
                                Nyelv
                            </option>
                            @foreach (\App\Enum\LanguageKnowledge::cases() as $language)
                                <option value={{$language}}>{{$language}}</option>
                            @endforeach
                        </x-selector>
                    </div>
                    <div class="pr-5">
                        <x-selector wire:model="lvl" class="select-sm">
                            <option selected>
                                Szint
                            </option>
                            @foreach (\App\Enum\LanguageKnowledge::getLevels() as $level)
                                <option value={{$level}}>{{$level}}</option>
                            @endforeach
                        </x-selector>
                    </div>
                    <button
                        class='btn btn-primary btn-xs my-auto'
                        wire:click="addLanguage"
                        @disabled($lvl == 'Szint' || $lang == 'Nyelv')
                    >
                        Hozzáad
                    </button>
                </div>
            @endcan
    </div>
</div>
