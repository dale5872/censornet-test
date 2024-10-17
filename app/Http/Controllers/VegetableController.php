<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVegetableRequest;
use App\Http\Requests\DeleteVegetableRequest;
use App\Http\Requests\IndexVegetableRequest;
use App\Http\Requests\ReadVegetableRequest;
use App\Http\Requests\UpdateVegetableRequest;
use App\Http\Resources\VegetableCollectionResource;
use App\Http\Resources\VegetableResource;
use App\Models\Vegetable;
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
        $vegetables = $this->vegetableService->getAllVegetables();
        return new VegetableCollectionResource($vegetables);
    }

    /**
     * Displays the entry of a Vegetable for a given ID
     *
     * @param ReadVegetableRequest $request
     * @param Vegetable            $vegetable
     *
     * @return VegetableResource
     */
    public function read(
        ReadVegetableRequest $request,
        Vegetable $vegetable
    ): VegetableResource {
        return new VegetableResource($vegetable);
    }


    /**
     * Creates a new Vegetable entry in the database, and returns it to the user
     *
     * @param CreateVegetableRequest $request
     *
     * @return VegetableResource
     */
    public function create(
        CreateVegetableRequest $request
    ): VegetableResource {
        $values = $request->validated();

        $vegetable = $this->vegetableService->createVegetable(
            $values
        );

        return new VegetableResource($vegetable);
    }

    /**
     * Updates an existing Vegetable entry in the database, and returns it to the user
     *
     * @param UpdateVegetableRequest $request
     * @param Vegetable              $vegetable
     *
     * @return VegetableResource
     */
    public function update(
        UpdateVegetableRequest $request,
        Vegetable $vegetable
    ): VegetableResource {
        $values = $request->validated();

        $vegetable = $this->vegetableService->updateVegetable(
            $vegetable,
            $values
        );

        return new VegetableResource($vegetable);
    }

    /**
     * Deletes a Vegetable from the database, and returns the deleted entry to the user
     *
     * @param DeleteVegetableRequest $request
     * @param Vegetable              $vegetable
     *
     * @return VegetableResource
     */
    public function delete(
        DeleteVegetableRequest $request,
        Vegetable $vegetable
    ): VegetableResource {
        $this->vegetableService->deleteVegetable(
            $vegetable
        );

        return new VegetableResource($vegetable);
    }
}
