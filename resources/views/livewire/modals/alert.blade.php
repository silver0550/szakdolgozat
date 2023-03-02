<div class="bg-base-200 text-base-800">
    <div class="cursor-default text-2xl bg-base-400 pt-5 pb-2 pl-5 font-bold border-b-2 border-base-600 ">
        <x-icon.delete class="mb-2"/>
        <span >Törlés!</span>
        <span wire:click="$emit('closeModal')" type='button' class="relative -top-2  text-gray-600 cursor-pointer hover:text-gray-400 float-right mr-5 ">x</span>
    </div>    
    <div class="cursor-default text-lg bg-base-400 pt-5 pl-5">
        <p>Biztos benne hogy törli?</p>
    </div>
    
    {{--<div class="flex pt-2 justify-center">
        <div>
            <x-icon.warning class=" mr-20 w-28 h-28 text-red-500"/>
        </div>

        <div class="my-auto text-xl">
            <p class="pb-2">A következő művelet 
                <span class="underline font-bold">nem</span>  
                vonható visza!</p>
            <p>
                <span class="text-lg font-bold">
                    {{$user->name}}
                </span> 
                Törlése
            </p>  
        </div>

    </div>

    <div class="pt-10">Biztos törli?</div>--}}
    <div class="modal-action pb-5 mr-10">
        <x-button.primary wire:click="remove" class="btn-sm mr-5">Törlés</x-button.primary>
        <x-button.primary wire:click="$emit('closeModal')" class="btn-sm" >Mégsem</x-button.primary>
    </div>
</div>