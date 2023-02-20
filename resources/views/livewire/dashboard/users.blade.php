<div>
    <div class="overflow-x-auto w-full">
        <table class="table table-zebra w-full text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Beosztás</th>
                    @can('asSuperAdmin')
                        <th>Admin</th>    
                    @endcan
                    @can('asAdmin')
                        <th>Törlés</th>
                        <th>Infó</th>
                    @endcan
                </tr>
              </thead>
            @foreach ($users as $user)
                @cannot('isSuperAdmin', $user)
                    @livewire('dashboard.users-list', ['user' => $user, 'index' => $loop->index], key($user->id))    
                @endcannot
            @endforeach
            <tr><td class="">Pagination</td></tr>
        </table>
    </div>
</div>
