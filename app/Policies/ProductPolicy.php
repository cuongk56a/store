<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user):bool
    {
        return $user->checkPermissionAccess(config('permission.access.list-product'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user):bool
    {
        return $user->checkPermissionAccess(config('permission.access.add-product'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, $id): bool
    {
        $product = Product::find($id);
        $role = $user->userRole;
        if(($user->checkPermissionAccess(config('permission.access.edit-product')) && $user->id === $product->user_id)  ||  $role[0]->name === 'admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, $id):bool
    {
        $product = Product::find($id);
        $role = $user->userRole;
        if(($user->checkPermissionAccess(config('permission.access.delete-product')) && $user->id === $product->user_id)  ||  $role[0]->name === 'admin'){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
