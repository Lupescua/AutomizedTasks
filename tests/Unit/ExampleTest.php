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
        $first = factory(Task::class)->create();

        $second = factory(Task::class)->create([
            'created_at'=> \Carbon\Carbon::now()->subMonth()
        ]);

        // When I fetch the archives.
        $tasks = Task::archives();

        // Then the response should be the proper format
        $this->assertCount(2,$tasks);
    }
}
