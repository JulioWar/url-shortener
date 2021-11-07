<?php

namespace Tests\Feature;

use App\Repositories\ShortUrlRepository;
use App\Services\AliasGenerator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShortUrlRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected $shortUrlRepository;

    public function setUp(): void {
        parent::setUp();
        $this->shortUrlRepository = $this->app->make(ShortUrlRepository::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_repository_should_create_a_new_record()
    {
        $shortUrl = $this->shortUrlRepository->create('http://google.com');

        $this->assertDatabaseHas('short_urls', $shortUrl);
    }
}
