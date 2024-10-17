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
    public function getAllVegetables(): Collection
    {
        return Vegetable::all();
    }

    /**
     * Creates a new Vegetable entry in the database from an array of values
     *
     * @param array $values
     *
     * @return Vegetable
     */
    public function createVegetable(
        array $values
    ): Vegetable {
        $vegetable = new Vegetable($values);
        $vegetable->save();
        return $vegetable;
    }

    /**
     * Updates an existing Vegetable entry from an array of values
     *
     * @param Vegetable $vegetable
     * @param array     $values
     *
     * @return Vegetable
     */
    public function updateVegetable(
        Vegetable $vegetable,
        array $values
    ): Vegetable {
        $vegetable->fill($values);
        $vegetable->save();
        return $vegetable;
    }

    /**
     * Deletes an existing Vegetable entry
     *
     * @param Vegetable $vegetable
     *
     * @return void
     */
    public function deleteVegetable(
        Vegetable $vegetable
    ) {
        $vegetable->delete();
    }
}
