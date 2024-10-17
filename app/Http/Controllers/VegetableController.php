<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexVegetableRequest;
use App\Http\Resources\VegetableResource;
use App\Services\VegetableService;
use Illuminate\Http\JsonResponse;
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
    ): ResourceCollection | JsonResponse
    {
        $vegetables = $this->vegetableService->getVegetables();
        return VegetableResource::collection($vegetables);
    }
}
