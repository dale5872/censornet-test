<?php

namespace Tests\Unit;

use App\Models\Vegetable;
use App\Services\VegetableService;
use Tests\TestCase;

class VegetableServiceTest extends TestCase
{
    private readonly VegetableService $vegetableService;

    public function setUp(): void
    {
        parent::setUp();

        $this->vegetableService = new VegetableService();
    }

    /**
     * Tests that getAllVegetables function correctly returns an array of Vegetables
     */
    public function test_getAllVegetables_returns_all_entries(): void
    {
        $collection = $this->vegetableService->getAllVegetables();
        self::assertNotNull($collection);
        self::assertJson($collection->toJson());
    }

    /**
     * Tests that createVegetable correctly adds a new entry into the database
     */
    public function test_createVegetable_creates_new_entry(): void
    {
        $values = [
            'name' => 'Cucumber',
            'description' => 'Cucumbers are a long, thin vegetable that grow on a creeping vine with large leaves and bright yellow flowers',
            'classification' => 'Pepo',
            'edible' => true
        ];

        $model = $this->vegetableService->createVegetable($values);
        self::assertInstanceOf(Vegetable::class, $model);

        $actual = Vegetable::query()
                ->where('id', $model->id)
                ->first()
                ->attributesToArray();
        $expected = $model->attributesToArray();
        self::assertEquals($expected, $actual);
    }

    /**
     * Tests that updateVegetable correctly updates an existing entry into the database
     */
    public function test_updateVegetable_updates_existing_entry(): void
    {
        $values = [
            'name' => 'Cucumber',
            'description' => 'Cucumbers are a long, thin vegetable that grow on a creeping vine with large leaves and bright yellow flowers',
            'classification' => 'Pepo',
            'edible' => true
        ];

        $model = Vegetable::factory()->create();

        $updatedModel = $this->vegetableService->updateVegetable(
            $model,
            $values
        );
        self::assertInstanceOf(Vegetable::class, $model);

        $actual = Vegetable::query()
            ->where('id', $model->id)
            ->first()
            ->attributesToArray();
        $expected = $updatedModel->attributesToArray();
        self::assertEquals($expected, $actual);
    }

    /**
     * Tests that deleteVegetable correctly deletes a Vegetable entry
     */
    public function test_deleteVegetable_deletes_entry(): void
    {
        $model = Vegetable::factory()->create();
        $this->vegetableService->deleteVegetable(
            $model
        );
        self::assertInstanceOf(Vegetable::class, $model);

        $actual = Vegetable::query()
            ->where('id', $model->id)
            ->first();
        self::assertNull($actual);
    }
}
