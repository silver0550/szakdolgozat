<div>
    <div class="overflow-x-auto w-full">
        <table class="table table-zebra w-full text-center">
            <thead>
                <tr>
                    <th>#</th>
                    @foreach ($columns as $column)
                        <th>{{$column}}</th>
                    @endforeach
                </tr>
              </thead>
            @foreach ($users as $user)
                @livewire('dashboard.users-list', ['user' => $user], key($user->id))
            @endforeach
            <tr><td class="">Pagination</td></tr>
        </table>
    </div>
</div>
