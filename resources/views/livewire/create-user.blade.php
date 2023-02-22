<div>
    <label wire:click="$emitSelf('resetAll')" for="{{ $myID }}" class="btn btn-sm btn-circle h-10 w-10 absolute right-5 top-5">✕</label>
    <h3 class="mt-10 font-bold text-lg">Felhasználó hozzáadása!</h3>
    <p class="py-4">Kérem adja meg a felhasználó adatait</p>
    <div class="w-11/12 m-auto mt-10 mb-20">
        <div class="flex justify-around w-full">
            <x-input.form-control-together class='w-5/12' label='Név'><x-input.text wire:model.debounce='name' :error="$errors->first('name')" /></x-input.form-control-together>
            <x-input.form-control-together class="w-5/12" label='Email'><x-input.text wire:model.debounce='email' :error="$errors->first('email')"/></x-input.form-control-together>
        </div>  
    </div>
    {{-- TODO: error handling, style, swiching input text--}}

    <div class="modal-action justify-around">
        <label wire:click="$emitSelf('create')" class="btn btn-primary">Mentés</label>
    </div>
</div>
