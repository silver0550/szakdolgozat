
<div>

    <div class="text-center">
        <h3 class="mt-10 font-bold text-lg">Felhasználó hozzáadása!</h3>
        <p class="py-4">Kérem adja meg a felhasználó adatait</p>
    </div>
    <div class="w-11/12 m-auto mt-10 mb-20">
        <div class="flex justify-around w-full">
            <x-input.form-control-together :error="$errors->first('newUser.name')" class='w-5/12' label='Név'><x-input.text wire:model.debounce='newUser.name'  /></x-input.form-control-together>
            <x-input.form-control-together :error="$errors->first('newUser.email')" class="w-5/12" label='Email'><x-input.text wire:model.debounce='newUser.email' /></x-input.form-control-together>
        </div>  
    </div>
    {{-- TODO: style--}}
    <div class="modal-action justify-around">
        <label wire:click="$emitSelf('create')" wire:keydown.enter="$emitSelf('create')" tabindex="0" class="btn btn-primary">Mentés</label>
    </div>
    
</div>
