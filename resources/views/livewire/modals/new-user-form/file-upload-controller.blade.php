<div class="flex py-3 px-5 bg-base-100 rounded-xl mt-2 mb-5 ">
    <x-input.form-control class=" w-3/4" :error="$errors->first('avatar')" label='Avatár'>
        <input wire:click="$set('avatar','')" wire:model='avatar' type="file" class="file-input file-input-sm file-input-bordered file-input-primary w-full max-w-xs " />
    </x-input.form-control>
    <div class="avatar flex w-1/4 justify-center my-auto ">
        <div class="w-20 h-20 rounded-xl bg-base-200">
            @if ($avatar && !$errors->first('avatar'))
                <img src="{{$avatar->temporaryUrl()}}" alt="Avatar preview">
            @endif
        </div>
    </div>    

</div>
