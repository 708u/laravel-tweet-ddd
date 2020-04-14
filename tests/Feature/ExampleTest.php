<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * @internal
 */
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

        $response->assertStatus(200);
    }

    /**
     * storage connection test
     *
     * @return void
     */
    public function testConnectingStorage()
    {
        $disk = Storage::disk('s3');
        $disk->put('hello.json', '{"hello": "world"}');
        $this->assertFalse($disk->exists('hello.json'));
    }
}
