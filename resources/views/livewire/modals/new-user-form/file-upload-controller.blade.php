<div class="flex justify-between py-3 px-5 bg-base-100 rounded-xl mt-2 mb-5 ">
    <div class="flex flex-col justify-center">
        <label for="avatar" class="label-text relative -top-3">Profil kép</label>
        <input wire:click="$set('avatar','')" wire:model='avatar' type="file" class="file-input file-input-sm file-input-bordered file-input-primary w-full max-w-xs " />
        <label class="label h-5"> 
            @error('avatar')
                <span class="label-text-alt text-error relative top-1 ">
                    {{$message}}
                </span>
            @enderror
        </label>

    </div>

    <div class="avatar flex w-1/4 justify-center my-auto ">
        <div class="w-20 h-20 rounded-xl bg-base-200">
            @if ($avatar && !$errors->first('avatar'))
                <img src="{{$avatar->temporaryUrl()}}" alt="Avatar preview">
            @endif
        </div>
    </div>    

</div>
