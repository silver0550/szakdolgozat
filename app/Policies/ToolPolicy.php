<?php

namespace App\Policies;

use App\Models\Tool;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToolPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tool  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */ 
    public function view(User $user, Tool $model)
    {
        if ($user->isAdmin){ return true;}

        return $user->id === $model->user_id;
    }

      /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tool  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user,Tool $model)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tool  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Tool $model)
    {
        return $user->isAdmin;
    }
}
