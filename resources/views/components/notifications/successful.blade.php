
<div x-data="{ open: false, title:'', content:'' }" @success.window="open = true, title = $event.detail.title, content = $event.detail.content">
    <label x-bind:class=" open ? 'modal-open' : ''" class="modal cursor-pointer">
        <label @click.outside="open = false" class="modal-box bg-green-400 text-black text-center " >
            <div class="flex w-full justify-center">
                <x-icon.checkmark class="mr-5"/>
                <h3 x-text="title" class="text-xl font-bold inline-block "></h3>
            </div>
          <p x-text="content" class="pt-2"></p>
        </label>
      </label>
</div>