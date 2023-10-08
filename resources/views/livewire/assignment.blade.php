<div class="h-full">
    @isset($title)
        <x-title label="{{ $title }}"/>
    @endisset

    <div class="flex">
        <div class="!w-5/12 h-[490px]">
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
                    <x-table.head class="cursor-default"></x-table.head>    {{--checkbox--}}
                    <x-table.head class="cursor-default"></x-table.head>    {{--picture--}}
                    <x-table.head class="cursor-default">{{ __('user.name')}}</x-table.head>
                    <x-table.head class="cursor-default">{{ __('user.email') }}</x-table.head>
                </x-slot>
                <x-slot name='body'>
                    @if($userHasTools)
                        @foreach($userHasTools as $tool)
                        <tr>
                            <td><x-input.checkbox></x-input.checkbox></td>
                            <td><img class="w-15 h-10 m-auto" src= "{{ $tool->owner->img }}" alt="ToolImg"></td>
                            <td>{{$tool->owner->myName}}</td>
                            <td>{{$tool->owner->serial_number}}</td>
                        </tr>
                        @endforeach
                    @endif
                </x-slot>
            </x-table>
        </div>
        <div class="flex flex-col justify-center items-center !w-1/12 h-[490px]">
            <x-icon.arrowLeft wire:click="test" class="!w-10 !h-10 my-10 cursor-pointer"/>
            <x-icon.arrowRight wire:click="test" class="!w-10 !h-10 cursor-pointer"/>
        </div>
        <div class="!w-5/12 h-[490px]">
            <div class="flex justify-between mb-5 w-full">
                <Label class="label label-lg font-bold pr-10">{{ __('tool.tools') }}</Label>
                <x-input.text class="!w-1/2" placeholder="{{ __('global.search') }}" ></x-input.text>
            </div>
            <x-table class="p-2 bg-base-200 rounded-md w-full h-full">
                <x-slot name="head">
                    <x-table.head class="cursor-default"></x-table.head>    {{--checkbox--}}
                    <x-table.head class="cursor-default"></x-table.head>    {{--picture--}}
                    <x-table.head class="cursor-default">{{ __('tool.serial_number')}}</x-table.head>
                    <x-table.head class="cursor-default">{{ __('tool.model_type') }}</x-table.head>
                </x-slot>
                <x-slot name='body'>
                    @foreach($tools as $tool)
                        <tr>
                            <td><x-input.checkbox></x-input.checkbox></td>
                            <td><img class="w-15 h-10 m-auto" src= "{{ $tool->owner->img }}" alt="ToolImg"></td>
                            <td>{{ $tool->owner->serial_number}}</td>
                            <td>{{ $tool->owner->myName }}</td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>

        </div>

    </div>
</div>
