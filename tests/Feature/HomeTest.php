<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageWorks()
    {
        $response = $this->get('/');

        $response->assertSeeText('Index Page');
    }

    public function testContactPageWorks()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact Page');
    }
}
