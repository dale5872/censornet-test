<?php

namespace Tests\Unit;

use App\Services\VegetableService;
use Tests\TestCase;

class VegetableServiceTest extends TestCase
{
    private readonly VegetableService $vegetableService;

    public function setUp(): void {
        parent::setUp();

        $this->vegetableService = new VegetableService();
    }

    /**
     * A basic unit test example.
     */
    public function test_getVegetables_returns_all_entries(): void
    {
        $collection = $this->vegetableService->getVegetables();
        self::assertNotNull($collection);
        self::assertJson($collection->toJson());
    }
}
