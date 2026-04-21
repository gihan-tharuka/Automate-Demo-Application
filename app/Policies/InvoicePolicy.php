<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Everyone can see the invoices index page, but we filter results in the query
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Invoice $invoice): bool
    {
        // Admin can view all invoices
        if ($user->isAdmin()) {
            return true;
        }
        
        // Users can only view their own invoices
        return $invoice->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     * Only admins can create invoices.
     */
    public function create(User $user): bool
    {
        // Only admin can create invoices
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     * Only admins can update invoices.
     */
    public function update(User $user, Invoice $invoice): bool
    {
        // Only admin can update invoices
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     * Only admins can delete invoices.
     */
    public function delete(User $user, Invoice $invoice): bool
    {
        // Only admin can delete invoices
        return $user->isAdmin();
    }
}