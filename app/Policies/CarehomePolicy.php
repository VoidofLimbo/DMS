<?php

namespace App\Policies;

use App\Models\Carehome;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarehomePolicy
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
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return !in_array(Role::DEFAULT_ROLE, $allroles);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Carehome $carehome)
    {
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return !in_array(Role::DEFAULT_ROLE, $allroles);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return in_array(Role::OWNER, $allroles);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Carehome $carehome)
    {
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return in_array(Role::OWNER, $allroles);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Carehome $carehome)
    {
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return in_array(Role::OWNER, $allroles);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Carehome $carehome)
    {
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return in_array(Role::SUPER_ADMIN, $allroles);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Carehome  $carehome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Carehome $carehome)
    {
        $allroles = array();
        foreach ($user->roles as $role) {
            array_push($allroles, $role->pivot->role_id);
        }
        return in_array(Role::SUPER_ADMIN, $allroles);
    }
}
