<div>

    {{-- CONTROLL BLOCK BEGIN --}}
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <div class="flex  ">
            @can('create', App\Models\User::class)
            <x-button.tooltip label="Visszaállítás" class="ml-7">
                <x-button.primary wire:click="resetAll" class="btn-circle">
                    <x-icon.passwordReset/>
                </x-button.primary>
            </x-button.tooltip>
        @endcan
            <div class="px-10  w-96 ">
                <x-input.text wire:model="search"  placeholder="Keresés..."/>
            </div>
            <div class="flex">
                <x-button.tooltip label="Osztályok">
                    <x-selector wire:model='departmentFilter'>
                        <option selected value="{{null}}">Összes</option>
                        @foreach (\App\Enum\Department::cases() as $department)
                            <option value={{$department}}>{{$department}}</option>
                        @endforeach
                    </x-selector>    
                </x-button.tooltip>
            </div>

        </div>
        
        @if($users->isNotEmpty())
            {{$users->links()}}
        @endif
    </div>
    {{-- CONTROLL BLOCK END --}}
    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md ">
        <x-slot name="head">
            @if ($users->isEmpty())
                <x-table.head class="cursor-default">Nics aktív kérés</x-table.head> 
            @else
                <x-table.head class="cursor-default">#</x-table.head> 
                <x-table.head wire:click="sort('name')" class="cursor-pointer">Név</x-table.head>
                <x-table.head wire:click="sort('email')" class="cursor-pointer">Email</x-table.head>
                <x-table.head wire:click="sort('id')" class="cursor-pointer">Létrehozva</x-table.head>
            @endif
        </x-slot>
        <x-slot name='body'>
            @foreach ($users as $user)
                @livewire('password-reset-list', ['user' => $user], key($user->id))
            @endforeach
        </x-slot>
    </x-table>

    @if($users->isNotEmpty())
        <x-pagination.info :paginator="$users" class=" mt-2 mr-2"/>
    @endif
    
    {{-- RESULT TABLE END --}}
</div>
