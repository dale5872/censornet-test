<?php

namespace App\Policies;

class VegetablePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function index(): bool
    {
        // Since there is no permissions or access control, we can allow all access
        return true;
    }
}
