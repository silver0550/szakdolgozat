<div class="h-full">
    @isset($title)
        <x-title label="{{ $title }}"/>
    @endisset

    <x-row>
        <div class="!w-[47%] h-[490px]">
            <div class="flex justify-between mb-5 w-full">
                <Label class="label label-lg font-bold pr-10">{{ __('user.user') }}</Label>
                <x-selector wire:model="userId">
                    <option disabled selected value="{{null}}">{{ __('global.select') }}</option>
                    @foreach(\App\Models\User::all() as $user)
                        <option value={{ $user->id }}>{{ $user->name }}
                        </option>
                    @endforeach
                </x-selector>
            </div>
            <x-table class="p-2 bg-base-200 rounded-md w-full h-full">
                <x-slot name="head">
                    <x-table.head class="cursor-default"></x-table.head> {{--checkbox--}}
                    <x-table.head class="cursor-default"></x-table.head> {{--picture--}}
                    <x-table.head class="cursor-default">{{ __('tool.serial_number')}}</x-table.head>
                    <x-table.head class="cursor-default">{{ __('tool.model_type') }}</x-table.head>
                </x-slot>
                <x-slot name='body'>
                    @if($userHasTools)
                        @foreach($userHasTools as $tool)
                            <tr>
                                <td>
                                    <x-input.checkbox wire:model="userPuffer.{{ $tool->id }}"></x-input.checkbox>
                                </td>
                                <td><img class="w-15 h-10 m-auto" src="{{ $tool->owner->img }}" alt="ToolImg"></td>
                                <td>{{$tool->owner->serial_number}}</td>
                                <td>{{$tool->owner->model_type}}</td>
                            </tr>
                        @endforeach
                    @endif
                </x-slot>
            </x-table>
        </div>
        <div class="flex flex-col justify-center items-center !w-[6%] h-[490px]">
            <x-icon.arrowLeft wire:click="releaseTool"
                              class="!w-10 !h-10 mt-20 mb-10 cursor-pointer hover:text-cyan-500"/>
            <x-icon.arrowRight wire:click="captureAllTools"
                               class="!w-10 !h-10 mb-10 cursor-pointer hover:text-red-500"/>
            <x-icon.arrowRight wire:click="captureTool" class="!w-10 !h-10 cursor-pointer hover:text-cyan-500"/>
        </div>
        <div class="!w-[47%] h-[490px]">
            <div class="flex justify-between mb-5 w-full">
                <Label class="label label-lg font-bold pr-10">{{ __('tool.tools') }}</Label>
                <x-input.text class="!w-1/2"
                              placeholder="{{ __('global.search') }}"
                              wire:model="search"/>
            </div>
            <x-table class="p-2 bg-base-200 rounded-md w-full h-full">
                <x-slot name="head">
                    <x-table.head class="cursor-default"></x-table.head> {{--checkbox--}}
                    <x-table.head class="cursor-default"></x-table.head> {{--picture--}}
                    <x-table.head class="cursor-default">{{ __('tool.serial_number')}}</x-table.head>
                    <x-table.head class="cursor-default">{{ __('tool.model_type') }}</x-table.head>
                </x-slot>
                <x-slot name='body'>
                    @foreach($tools as $tool)
                        <tr>
                            <td>
                                <x-input.checkbox wire:model="storagePuffer.{{ $tool->id }}"></x-input.checkbox>
                            </td>
                            <td><img class="w-15 h-10 m-auto" src="{{ $tool->owner->img }}" alt="ToolImg"></td>
                            <td>{{ $tool->owner->serial_number}}</td>
                            <td>{{ $tool->owner->myName }}</td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    </x-row>
</div>
