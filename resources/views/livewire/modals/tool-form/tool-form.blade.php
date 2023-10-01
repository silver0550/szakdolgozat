<div>
    <x-modals.body class="flex flex-col mx-10">
        <div class="flex mb-2">
            <ul class="menu menu-horizontal menu-lg bg-base-200 rounded-box">
                @foreach(\App\Models\Tool::getTypes() as $model)
                    @if($target == \App\Http\Livewire\Modals\ToolForm\ToolForm::CREATE)
                        <li wire:click="$set('classType','{{ addslashes($model) }}')">
                    @else
                        <li @class(['disabled' => !($classType == $model)])>
                    @endif
                        <img class="h-20 @if($classType == $model) active @endif"
                             src="{{ (new $model)->img }}" alt="Tool">
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex cursor-default text-2xl py-2 pl-3 font-bold  ">
            <div class="inline-block pl-3">{{ (new $classType)->myName }} </div>
        </div>
        <hr>
        <div class="pt-5 ">
            @switch($classType)
                @case(\App\Models\Phone::class)
                    @livewire('tool-view.' . $classType::LANG, ['tool' => $tool])
                    @break
                @case(\App\Models\Notebook::class)
                    @livewire('tool-view.' . $classType::LANG, ['tool' => $tool])
                    @break
                @case(\App\Models\Display::class)
                    @livewire('tool-view.' . $classType::LANG, ['tool' => $tool])
                    @break
                @case(\App\Models\Printer::class)
                    @livewire('tool-view.' . $classType::LANG, ['tool' => $tool])
                    @break
                @case(\App\Models\SimCard::class)
                    @livewire('tool-view.' . lineLifter($classType::LANG), ['tool' => $tool])
                    @break
                @case(\App\Models\Tablet::class)
                    @livewire('tool-view.' . $classType::LANG, ['tool' => $tool])
                    @break
                @case(\App\Models\WorkStation::class)
                    @livewire('tool-view.' . lineLifter($classType::LANG), ['tool' => $tool])
                    @break
            @endswitch
        </div>
    </x-modals.body>
    <x-modals.control>
        @role('system|admin')
        <x-button.primary
            wire:click="$emitTo('{{'tool-view.' . lineLifter($classType::LANG)}}','{{
                $target == \App\Http\Livewire\Modals\ToolForm\ToolForm::CREATE ? 'store' : 'edit' }}')"
            :disabled="!$classType">
            {{ __('global.save') }}
        </x-button.primary>
        @endrole
    </x-modals.control>
</div>
