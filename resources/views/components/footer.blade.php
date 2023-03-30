<div class="fixed left-60 bottom-0 right-0 bg-base-500">
    <footer class="footer items-center p-5 bg-neutral text-neutral-content">
        <div class="items-center grid-flow-col ">
            <p>Copyright © {{now()->year}} - All right reserved</p>
        </div> 
        <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            <a href=""><x-icon.twitter/></a>
            <a href=""><x-icon.youtube/></a>
            <a href=""><x-icon.facebook/></a>
        </div>
    </footer>

    {{-- NOTIFICATION MODELS --}}

    <div x-data="{ open: false, title:'', content:'' }" @success.window="open = true, title = $event.detail.title, content = $event.detail.content">
        <label x-bind:class=" open ? 'modal-open' : ''" class="modal cursor-pointer">
            <label @click.outside="open = false" class="modal-box bg-green-400  text-black relative" for="">
                <div class="flex">
                    <x-icon.checkmark class="mr-5"/>
                    <h3 x-text="title" class="text-lg font-bold"></h3>
                </div>
              <p x-text="content" class="py-4"></p>
            </label>
          </label>
    </div>
    
    <div x-data="{ open: false, title:'', content:'' }" @faild.window="open = true, title = $event.detail.title, content = $event.detail.content">
        <label x-bind:class=" open ? 'modal-open' : ''" class="modal cursor-pointer">
            <label @click.outside="open = false" class="modal-box  bg-red-500  text-black relative" for="">
              <h3 x-text="title" class="text-lg font-bold"></h3>
              <p x-text="content" class="py-4"></p>
            </label>
          </label>
    </div>



</div>