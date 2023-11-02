<div>
    @isset($title)
        <x-title label="{{ $title }}"/>
    @endisset
    {{-- CONTROLL BLOCK BEGIN --}}
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <x-row>
            @can('create-user')
                <x-button.tooltip side='right' label="{{ __('user.add') }}" class="ml-7">
                    <x-button.primary
                        wire:click="$emit('openModal','modals.new-user-form')"
                        class="btn-circle">+
                    </x-button.primary>
                </x-button.tooltip>
            @endcan
            <div class="px-10 w-96">
                <x-input.text
                    wire:model="filters.search"
                    placeholder="{{ __('user.search') }}..."/>
            </div>
            <div class="flex">
                <x-button.tooltip label="{{ __('user.classes') }}">
                    <x-selector wire:model='filters.department'>
                        <option selected value="{{ null }}">{{ __('global.all') }}</option>
                        @foreach (\App\Enum\DepartmentEnum::cases() as $department)
                            <option value={{ $department->value }}>{{ $department->getReadableText() }}</option>
                        @endforeach
                    </x-selector>
                </x-button.tooltip>
            </div>
        </x-row>
        {{$users->links()}}
    </div>
    {{-- CONTROLL BLOCK END --}}
    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md ">
        <x-slot name="head">
            @if (!$users->count())
                <x-table.head class="cursor-default">{{ __('global.search_not_found') }}</x-table.head>
            @else
                <x-table.head wire:click="sort('name')" class="cursor-pointer">{{ __('user.name') }}</x-table.head>
                <x-table.head wire:click="sort('email')" class="cursor-pointer">{{__('user.email')}}</x-table.head>
                <x-table.head wire:click="sort('id')" class="cursor-pointer">{{ __('user.created_at') }}</x-table.head>
            @endif
        </x-slot>
        <x-slot name='body'>
            @foreach ($users as $user)
                @livewire('dashboard.users-list', ['user' => $user], key($user->id))
            @endforeach
        </x-slot>
    </x-table>
    <x-pagination.info :paginator="$users" class=" mt-2 mr-2"/>
    {{-- RESULT TABLE END --}}

</div>
