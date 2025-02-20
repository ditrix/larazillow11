<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{


    /* использование функции для указания суперправ администратору*/
    public function before(?User $user, $ability)
    {
        //   if($user?->is_admin && $ability === 'update')  только для редактирования
        // NB! $user?...  синоним if($user && $user->is_admin)
        // для случая если пользователя нет или не авторизирован. иначе - будет ошибка
        if($user?->is_admin)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *  для Controller::idex
     *  User опциональный
     */
    public function viewAny(?User $user): bool
    {
        // например
        //return $user->isAdmin(); // или другая логика
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * User опциональный
     */
    public function view(?User $user, Listing $listing): bool
    {
        return true;
     //   return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }
}
