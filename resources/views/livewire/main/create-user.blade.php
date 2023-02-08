<div class="w-full h-full" >

    <div class="m-auto w-11/12 top-20 grid card rounded-box  bg-gray-300">
        <h1 class="text-center pt-6 rounded-t-2xl h-20 bg-slate-400">Alkalmazott hozzáadása</h1>
        <div class="px-6"> 
            <div class="flex flex-row mt-11 justify-center">
                <input type="text" placeholder="Név" class="input input-bordered input-primary w-full max-w-xs inline-block mr-20" /> 
                <input type="text" placeholder="E-mai cím" class="input input-bordered input-primary w-full max-w-xs inline-block " /> 
            </div>
            <div class="flex flex-row mt-11 justify-center">
                <select class="select select-primary w-full max-w-xs ">
                    <option disabled selected>Beosztás</option>
                    @foreach ($dto->assignments as $assignment)
                        <option>{{$assignment}}</option>
                    @endforeach

                </select>
            </div>
            <div class="pb-10">
                <div class="my-11 mb-11">
                    <div class="form-control float-right">
                        <label class="label cursor-pointer w-28">
                          <span class="label-text">Admin</span> 
                          <input type="checkbox" class="toggle toggle-primary"  />
                        </label>
                    </div>
                </div>
            
                <label for="btn-save" class="btn m-auto">Mentés</label>
            </div>
            @if (1)
                <input type="checkbox" id="btn-save" class="modal-toggle" />
                <label for="btn-save" class="modal cursor-pointer">
                <label class="modal-box relative" for="">
                <h3 class="text-lg font-bold">Sikeres mentés!</h3>
                <p class="py-4">Az alkalmazott az adatbázishoz sikeresen hozzáadva!</p>
                </label>
                </label>    
            @endif
        </div>
    </div>
</div>
