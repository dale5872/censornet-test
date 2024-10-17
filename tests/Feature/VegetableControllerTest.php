<?php

namespace Tests\Feature;

use Tests\TestCase;

class VegetableControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_returns_json_collection(): void
    {
        $response = $this->get('/vegetables');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'classification',
                    'description',
                    'edible'
                ]
            ]
        ]);
    }
}
