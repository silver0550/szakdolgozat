<div>
    <figure class="avatar w-full">

        <div class="rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
            @if ($avatar && !$errors->first('unvalidedAvatar'))
                <img src={{$avatar->temporaryUrl()}} alt="avatar">    
            @else
                <img src={{\App\Enum\Avatar::DEFAULT_AVATAR}} alt="avatar">    
            @endif
        </div>
    
    </figure>
    @can('update', $user)
        <div class=" w-[20%] h-[20%] inline-block relative -top-10 float-right ring {{$errors->first('unvalidedAvatar') ? 'ring-error' : 'ring-primary'}} ring-offset-base-100 rounded-full">
            <label  for="file-input">
                <x-icon.pencil class="w-full h-full p-2 cursor-pointer"/>
            </label>
            <input wire:model="unvalidedAvatar" class="hidden" type="file" id="file-input">
        </div>
    @endcan

</div>
