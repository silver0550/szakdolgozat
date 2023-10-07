<div class="h-full">
    @isset($title)
        <x-title label="{{ $title }}"/>
    @endisset

    <div class="flex">
        <div class="!w-5/12 h-[500px]">
            <Label class="label label-lg font-bold">Idő jönnek a szövegek</Label>
            <x-table class="p-2 bg-base-200 rounded-md w-full h-full">
                <x-slot name="head">
                        <x-table.head class="cursor-default">{{ __('user.name')}}</x-table.head>
                        <x-table.head class="cursor-default">{{ __('user.email') }}</x-table.head>
                </x-slot>
                <x-slot name='body'>
                    @foreach(\App\Models\User::all() as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
        <div class="!w-1/12 h-[500px]">

        </div>
        <div class="!w-5/12 h-[500px]">
            <Label class="label label-lg font-bold">Idő jönnek a szövegek</Label>
            <x-table class="p-2 bg-base-200 rounded-md w-full h-full">
                <x-slot name="head">
                    <x-table.head class="cursor-default">{{ __('user.name')}}</x-table.head>
                    <x-table.head class="cursor-default">{{ __('user.email') }}</x-table.head>
                </x-slot>
                <x-slot name='body'>
                    @foreach(\App\Models\User::all() as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>

        </div>


    </div>
</div>
