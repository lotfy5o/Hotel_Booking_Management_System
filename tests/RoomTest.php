<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Room;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;


class RoomTest extends TestCase
{
    use RefreshDatabase;


    protected function setUp(): void
    {
        parent::setUp();

        // Run migrations
        // Artisan::call('migrate');

        // // Optionally, run specific seeders
        // Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
    }

    /**
     * A basic feature test example.
     */
    public function test_rooms_page_displays_all_rooms_correctly(): void
    {
        $room = Room::factory()->create();
        $response = $this->get(route('front.rooms'));

        $response->assertStatus(200);

        $response->assertViewHas('rooms');

        $response->assertViewHas('rooms', function ($item) use ($room) {
            return $item->contains($room);
        });
    }
}
