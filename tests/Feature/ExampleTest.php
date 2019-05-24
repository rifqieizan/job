<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertSee('Laravel');
    }

    // important  step 
    /** @test */
    public function about_route_return_something()
    {
        $response = $this->get('/about');
        // dd($response);
        $response->assertStatus(200);
        
    }
    /** @test */
    public function contact_on_route_return_something(){
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    // running : vendor/bin/phpunit or phpunit app/tests/

}
