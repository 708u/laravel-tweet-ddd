<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MinioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMinioConnection()
    {
        $disk = Storage::disk('s3');
        $disk->put('Hello.json', '{"hello": "world"}');

        $this->assertTrue(Storage::disk('s3')->exists('helloHello.json'));
    }
}
