<div class="w-full">

    {{-- PREVIEW --}}

    <figure class="avatar w-full">

        <div class="rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">

            @if ($validAvatar)

                <img src={{$validAvatar->temporaryUrl()}} alt="avatar">    
            
            @else
            
                @if ($user->avatar_path && Storage::disk('public')->exists($user->avatar_path))

                    <img src='storage/{{$user->avatar_path}}' alt="avatar">
                        
                @else
                    
                    <img src={{\App\Enum\Avatar::DEFAULT_AVATAR}} alt="avatar">    
            
                @endif
            
            @endif

        </div>
    
    </figure>

    {{-- UPDATE --}}

    @can('update', $user)

        <div class=" w-[20%] h-[20%] inline-block relative -top-12 float-right ring {{$errors->first('unvalidedAvatar') ? 'ring-error' : 'ring-primary'}} ring-offset-base-100 rounded-full bg-base-100 hover:bg-base-300">
          
            <label  for="file-input">
                <x-icon.pencil class="w-full h-full p-2 cursor-pointer"/>
            </label>
           
            <input wire:model="unvalidedAvatar" class="hidden" type="file" id="file-input">
        </div>

    @endcan

</div>
