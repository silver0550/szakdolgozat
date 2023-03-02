<div class="flex justify-between text-base-800 border-b-2 border-base-600">
    <div class="flex cursor-default text-2xl bg-base-400 pt-5 pb-2 pl-5 font-bold  ">
        {{ $icon }}
        <div class="inline-block pl-3">{{ $label }}</div>
    </div>
    <span wire:click="$emit('closeModal')" type='button' class="flex text-2xl font-bold text-gray-600 cursor-pointer hover:text-gray-400 pr-5 pt-3">x</span>

</div>  