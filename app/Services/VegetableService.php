<?php

namespace App\Services;

use App\Models\Vegetable;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service class that handles all the interactions with the Vegetable database table
 */
class VegetableService
{

    public function __construct()
    {
    }

    /**
     * Fetches all entries within the vegetables table from the database
     *
     * @return Collection
     */
    public function getVegetables(): Collection
    {
        return Vegetable::all();
    }
}
