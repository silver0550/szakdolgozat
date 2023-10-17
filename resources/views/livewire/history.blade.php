<div>
    @isset($title)
        <x-title label="{{ $title }}"/>
    @endisset

    <Label class="label label-lg font-bold pr-10"> {{ __('history.filters') }}</Label>
    <div class="bg-base-200 rounded-md py-2 px-4">
        <div class="flex mb-5 w-full">
            <x-selector
                class="w-1/3"
                wire:model="filters.type"
                label="{{ __('history.type') }}">
                <option selected value="{{ null }}">{{ __('global.select') }}</option>
                <option value="{{ \App\Models\User::class }}">{{ __('user.user') }}</option>
                @foreach(\App\Models\Tool::getTypes() as $tool)
                    <option value={{ $tool }}>{{  (new $tool)->myName}} </option>
                @endforeach
            </x-selector>
            <x-selector
                class="w-1/3"
                wire:model="filters.userId"
                label="{{ __('user.user') }}"
                :disabled='$this->isNotUser()'>
                <option selected value="{{ null }}">{{ __('-') }}</option>
                @foreach(\App\Models\User::all() as $user)
                    <option value={{ $user->id }}>{{ $user->name }} </option>
                @endforeach
            </x-selector>
            <x-selector
                class="w-1/3"
                wire:model="filters.causerId"
                label="{{ __('history.causer') }}">
                <option selected value="{{ null }}">{{ __('global.select') }}</option>
                @foreach(\App\Models\User::all() as $user)
                    <option value={{ $user->id }}>{{ $user->name }} </option>
                @endforeach
            </x-selector>
        </div>
        <div class="flex">
            <x-selector
                class="w-1/4"
                wire:model="filters.action"
                label="{{ __('history.action') }}">
                <option selected value="{{ null }}">{{ __('global.all') }}</option>
                @foreach(\App\Enum\ActionEnum::cases() as $actionEnum)
                    <option value={{ $actionEnum->value }}>{{ $actionEnum->getReadableText() }} </option>
                @endforeach
            </x-selector>
            <x-input.form-control
                class="w-1/4 mx-10"
                wire:model.lazy="filters.from_date"
                label="{{ __('history.from_date') }}">
                <x-input.date/>
            </x-input.form-control>
            <x-input.form-control
                class="w-1/4"
                wire:model.lazy="filters.to_date"
                label="{{ __('history.to_date') }}">
                <x-input.date/>
            </x-input.form-control>
        </div>
    </div>
    <div class="flex justify-end mt-5">
        {{$activities->links()}}
    </div>
    <div class="mt-5">
        <x-table class="p-2 bg-base-200 rounded-md w-full h-full">
            <x-slot name="head">
                <x-table.head class="cursor-default"></x-table.head>
                <x-table.head class="cursor-default">{{ __('history.action')}}</x-table.head>
                <x-table.head class="cursor-default">{{ __('history.name') }}</x-table.head>
                <x-table.head class="cursor-default">{{ __('history.causer') }}</x-table.head>
                <x-table.head class="cursor-default">{{ __('history.date') }}</x-table.head>
                <x-table.head class="cursor-default">{{ __('history.time') }}</x-table.head>
            </x-slot>
            <x-slot name='body'>
                @foreach($activities as $activity)
                    <tr>
                        <td>
                            <img class=" w-7 h-7 rounded-md" src="{{ $activity->subject?->img}}" alt="" />
                        </td>
                        <td>{{ \App\Enum\ActionEnum::from($activity->description)->getReadableText() }}</td>
                        <td>
                            {{ $activity->subject?->name ?? $activity->subject?->myName }}
                        </td>
                        <td>{{ $activity->causer->name ?? 'Seed' }}</td>
                        <td>{{ $activity->created_at->format('Y-m-d') }}</td>
                        <td>{{ $activity->created_at->format('h:m:s') }}</td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>
</div>
