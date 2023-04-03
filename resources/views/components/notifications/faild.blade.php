<div x-data="{ open: false, title:'', content:'' }" @faild.window="open = true, title = $event.detail.title, content = $event.detail.content">
    <label x-bind:class=" open ? 'modal-open' : ''" class="modal cursor-pointer">
        <label @click.outside="open = false" class="modal-box  bg-red-400 text-black text-center relative" >
            <div class="flex w-full justify-center">
                <x-icon.warning class="mr-5"/>
                <h3 x-text="title" class="text-xl font-bold inline-block "></h3>
            </div>
          <p x-text="content" class="py-4"></p>
        </label>
      </label>
</div>