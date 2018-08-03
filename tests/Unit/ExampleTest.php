<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Task;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Given -> I have two records in the database that are posts.
        // and each one is posted a month apart.
        

        // When I fetch the archives.
        Task::archive();

        // Then the response should be the proper format
        $this->get('/')->assertSee('Tasks');
    }
}
