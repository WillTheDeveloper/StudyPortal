<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
//  Test if admins can do what they need to do.
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
