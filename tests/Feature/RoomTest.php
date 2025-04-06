<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Room;
use App\Models\User;
use App\Models\Admin;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mcamara\LaravelLocalization\LaravelLocalization;


class RoomTest extends TestCase
{
    use RefreshDatabase;

    private Admin $admin;

    private User $user;

    private function createAdmin()
    {
        return Admin::factory()->create();
    }

    private function createUser()
    {
        return User::factory()->create();
    }

    protected function setUp(): void
    {
        parent::setUp();


        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\SettingSeeder']);

        View::share('settings', Setting::find(1));
        View::share('services', Service::all());
        View::share('amenities', Service::all());


        $this->admin = $this->createAdmin();

        $this->user = $this->createUser();

        // Disable CSRF middleware for testing.
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
    }


    protected function refreshApplicationWithLocale($locale)
    {
        self::tearDown();
        putenv(LaravelLocalization::ENV_ROUTE_KEY . '=' . $locale);
        self::setUp();
    }

    protected function tearDown(): void
    {
        putenv(LaravelLocalization::ENV_ROUTE_KEY);
        parent::tearDown();
    }

    /**
     * A basic feature test example.
     */
    public function test_rooms_page_rendered_successfully(): void
    {
        $this->refreshApplicationWithLocale('en');

        $room = Room::factory()->create();
        $response = $this->get(route('front.rooms'));

        $response->assertStatus(200);

        $response->assertViewHas('rooms');

        $response->assertViewHas('rooms', function ($item) use ($room) {
            return $item->contains($room);
        });
    }
}
