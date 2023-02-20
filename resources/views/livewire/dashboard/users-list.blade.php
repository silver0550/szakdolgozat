<tr>
    <td>{{$index}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->admin}}</td>
    @can('asSuperAdmin')
        <td><input wire:click='update'  wire:model='user.admin' type="checkbox" class="toggle" /></td>
    @endcan
    @can('asAdmin')
        <td>
            <button wire:click='delete' class="btn btn-circle btn-outline btn-sm" title="Törlés">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
              </button>
        </td>
        <td>
            <button class="btn btn-circle btn-outline border-collapse btn-sm" title="infó">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              </button>
        </td>    
    @endcan
    
</tr>

