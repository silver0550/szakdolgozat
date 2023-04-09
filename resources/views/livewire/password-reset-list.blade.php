<x-table.row class='text-center'>
    <x-table.cell><input wire:model="isActive" wire:click="$emitUp('statusChange', {{$user->id}})" type="checkbox" class="checkbox checkbox-primary" /></x-table.cell>
    <x-table.cell>{{$user->name}} @if($user->admin) <span class="text-red-600">*</span>@endif</x-table.cell>
    <x-table.cell>{{$user->email}}</x-table.cell>
    <x-table.cell>{{App\Models\PasswordReset::where('user_id', $user->id)->first()->created_at->format('Y.m.d.')}}</x-table.cell>

    <x-table.cell>
        <x-button.tooltip label="{{$user->name}}">

        <x-icon.phone class=" hover:text-blue-500 cursor-pointer " /></x-table.cell> 
        </x-button.tooltip>
    <x-table.cell>
        @can('update', $user)
            <x-icon.edit wire:click="$emit('openModal','modals.user-info',['{{$user->id}}'])" class="hover:text-blue-500 cursor-pointer"/>
        @endcan
    </x-table.cell>


</x-table.row>