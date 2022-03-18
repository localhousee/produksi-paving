<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_seed_data()
    {
        $this->seed();
        $this->get('/login')->assertStatus(200);
    }
}
