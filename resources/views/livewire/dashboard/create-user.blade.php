<div class="w-full h-full" >

    <div class="m-auto w-10/12 top-20 grid card rounded-box  bg-gray-300">
        <h1 class="text-center text-3xl pt-6 rounded-t-2xl h-20 bg-slate-400">Alkalmazott hozzáadása</h1>
        <div class="m-auto mt-11 w-11/12 "> 
            <div class="flex flex-col ml-8">
                <input wire:model.lazy="name" type="text" placeholder="Név" class= "input input-bordered input-primary @error('name')input-error @enderror w-full max-w-xs inline-block mb-10"/> 
                <input wire:model.lazy='email' type="text" placeholder="E-mai cím" class="input input-bordered input-primary @error('email')input-error @enderror w-full max-w-xs inline-block  mb-10 " /> 
                <select wire:model= 'post' class="select select-primary @error('post')select-error @enderror w-full max-w-xs inline-block  mb-10">
                    <option disabled selected >Beosztás</option>
                    @foreach ($dto->assignments as $assignment)
                        <option>{{$assignment}}</option>
                    @endforeach
                </select>

            </div>
            <div class="pb-10">
                <button wire:click="save" class="btn m-auto">Save</button>
            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-error shadow-lg ">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>{{$errors->first()}}</span>
                </div>
            </div>
        @endif

        @if ($dto->successful)
        <div class="alert alert-success shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>Az alkalmazott sikeresen hozzáadva!</span>
            </div>
          </div>
        @endif

    
    </div>
</div>
