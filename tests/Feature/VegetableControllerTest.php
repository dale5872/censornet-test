<?php

namespace Tests\Feature;

use Tests\TestCase;

class VegetableControllerTest extends TestCase
{
    private array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ];

    /**
     * Tests that the index endpoint returns a JSON collection of all the Vegetables in the database
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

    /**
     * Tests that the read endpoint returns a single Vegetable based on the input ID
     */
    public function test_read_returns_single_vegetable(): void
    {
        $response = $this->get('/vegetables/1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'classification',
                'description',
                'edible'
            ]
        ]);
    }

    /**
     * Tests that the read endpoint correctly errors with a 404 code when trying to
     * read a Vegetable that does not exist
     */
    public function test_read_fails_to_on_missing_vegetable(): void
    {
        $response = $this->get('/vegetables/100000');

        $response->assertStatus(404);
    }

    /**
     * Tests that the create endpoint correctly can create a new Vegetable entry
     */
    public function test_can_create_vegetable(): void
    {
        $response = $this->postJson(
            '/vegetables',
            [
                'name' => 'Onion',
                'description' => 'Onions have a stem, roots, and leaves, and are characterized by their edible underground bulb.',
                'classification' => 'Allium',
                'edible' => true
            ],
            $this->headers
        );

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'classification',
                'description',
                'edible'
            ]
        ]);
    }

    /**
     * Tests that the create endpoint correctly fails with a 422 error code when attempting to create a new entry
     * with missing data
     */
    public function test_fails_to_create_vegetable_with_missing_data(): void
    {
        $response = $this->postJson(
            '/vegetables',
            [
                'name' => 'Onion',
                'description' => 'Onions have a stem, roots, and leaves, and are characterized by their edible underground bulb.',
                'edible' => true
            ],
            $this->headers
        );

        $response->assertStatus(422);
    }

    /**
     * Tests that the create endpoint correctly errors with a 422 error code when attempting to create a new entry
     * with incorrect data type(s)
     */
    public function test_fails_to_create_vegetable_with_incorrect_data(): void
    {
        $response = $this->postJson(
            '/vegetables',
            [
                'name' => 12345,
                'description' => 'Onions have a stem, roots, and leaves, and are characterized by their edible underground bulb.',
                'classification' => 'Allium',
                'edible' => true
            ],
            $this->headers
        );

        $response->assertStatus(422);
    }


    /**
     * Tests that the update endpoint correctly can update a new Vegetable entry
     */
    public function test_can_update_vegetable(): void
    {
        $response = $this->patchJson(
            '/vegetables/1',
            [
                'name' => 'Onion',
                'description' => 'Onions have a stem, roots, and leaves, and are characterized by their edible underground bulb.',
                'classification' => 'Allium',
                'edible' => true
            ],
            $this->headers
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'classification',
                'description',
                'edible'
            ]
        ]);
    }

    /**
     * Tests that the update endpoint correctly fails with a 422 error code when attempting to update a new entry
     * with missing data
     */
    public function test_fails_to_update_vegetable_with_missing_data(): void
    {
        $response = $this->patchJson(
            '/vegetables/1',
            [
                'name' => 'Onion',
                'description' => 'Onions have a stem, roots, and leaves, and are characterized by their edible underground bulb.',
                'edible' => true
            ],
            $this->headers
        );

        $response->assertStatus(422);
    }

    /**
     * Tests that the update endpoint correctly errors with a 422 error code when attempting to create a new entry
     * with incorrect data type(s)
     */
    public function test_fails_to_update_vegetable_with_incorrect_data(): void
    {
        $response = $this->patchJson(
            '/vegetables/1',
            [
                'name' => 12345,
                'description' => 'Onions have a stem, roots, and leaves, and are characterized by their edible underground bulb.',
                'classification' => 'Allium',
                'edible' => true
            ],
            $this->headers
        );

        $response->assertStatus(422);
    }

    /**
     * Tests that the delete endpoint correctly deletes the correct entry
     */
    public function test_can_delete_a_vegetable(): void
    {
        $response = $this->delete(
            '/vegetables/1',
            [],
            $this->headers
        );

        $response->assertStatus(200);

        $readResponse = $this->get('/vegetables/1');
        $readResponse->assertStatus(404);
    }

    /**
     * Tests that the delete endpoint correctly fails to delete a missing vegetable
     */
    public function test_fails_to_delete_a_missing_vegetable(): void
    {
        $response = $this->delete(
            '/vegetables/100000',
            [],
            $this->headers
        );

        $response->assertStatus(404);
    }
}
