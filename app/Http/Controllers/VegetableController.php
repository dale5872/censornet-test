<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexVegetableRequest;
use App\Http\Resources\VegetableCollectionResource;
use App\Services\VegetableService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VegetableController
{

    public function __construct(
        private readonly VegetableService $vegetableService
    )
    {
    }

    /**
     * Displays all entries of Vegetable in the database
     */
    public function index(
        IndexVegetableRequest $request
    ): ResourceCollection
    {
        $vegetables = $this->vegetableService->getVegetables();
        return new VegetableCollectionResource($vegetables);
    }
}
