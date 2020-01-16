<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class APITest extends TestCase
{
    /**
     * Get all units
     *
     * @return void
     */
    public function testGetAllUnits()
    {
        $response = $this->json('GET', '/api/units');
        $response->assertStatus(200);
    }

    /**
     * Get one unit
     *
     * @return void
     */
    public function testGetOneUnit()
    {
        $response = $this->json('GET', '/api/units/2');
        $response->assertStatus(200);
        $response->assertSeeText("Post Office");
    }

    /**
     * Create a charge
     *
     * @return void
     */
    public function testCreateCharge()
    {
        $response = $this->json
        ('POST', '/api/charges', ['unit_id' => 1, 'start' => '2019-12-06 23:00:00']);

        $response->assertStatus(201);
    }

    /**
     * Update a charge
     *
     * @return void
     */
    public function testUpdateChargeOnUnit()
    {
        $response = $this->json
        ('PATCH', '/api/units/2/charges/8',
            ['unit_id' => 2, 'id' => 8, 'start' => '2019-12-06 23:00:00', 'end' => '2019-12-06 23:25:25']);

        $response->assertStatus(200);
    }
}
