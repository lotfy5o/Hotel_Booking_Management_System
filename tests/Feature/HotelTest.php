<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use App\Models\Hotel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Mcamara\LaravelLocalization\LaravelLocalization;

class HotelTest extends TestCase
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

    public function testDatabaseIsSQLite()
    {
        // Check that the database connection is SQLite
        $this->assertEquals('sqlite', DB::connection()->getDriverName());
    }

    public function test_unauthenticated_user_cannot_access_hotels()
    {
        $this->refreshApplicationWithLocale('en');

        $response = $this->get(route('back.hotels.index'));

        $response->assertStatus(302);

        $response->assertRedirect('/back/login');
    }

    public function test_login_redirects_to_dashboard_index_page(): void
    {

        $admin = Admin::create([
            'name' => 'lotfy',
            'email' => 'lotfy@gmail.com',
            'password' => bcrypt(123456789)
        ]);

        $response = $this->post(route('back.login'), [
            'email' => 'lotfy@gmail.com',
            'password' => '123456789',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/back/');
    }

    public function test_hotel_page_contain_empty_table()
    {
        $this->refreshApplicationWithLocale('en');
        $response = $this->actingAs($this->admin, 'admin')->get(route('back.hotels.index'));
        $response->assertSee(__('keywords.no_records_found'));
    }

    public function test_paginated_hotels_table_doesnt_contain_the_11th_record()
    {
        $this->refreshApplicationWithLocale('en');

        $hotels = Hotel::factory(11)->create();
        $lastHotel = $hotels->last();

        $response = $this->actingAs($this->admin, 'admin')->get(route('back.hotels.index'));

        $response->assertStatus(200);
        $response->assertViewHas('hotels', function ($collection) use ($lastHotel) {
            return !$collection->contains($lastHotel);
        });
    }

    public function test_admin_can_see_create_button()
    {
        $this->refreshApplicationWithLocale('en');

        $response = $this->actingAs($this->admin, 'admin')->get(route('back.hotels.index'));

        $response->assertStatus(200);
        $response->assertSee(__('keywords.add_new'));
    }

    public function test_non_admin_cannot_see_create_button()
    {
        $this->refreshApplicationWithLocale('en');

        $response = $this->actingAs($this->user, 'web')->get(route('back.hotels.index'));

        $response->assertStatus(302);
        $response->assertRedirect('/back/login');
        $response->assertDontSee(__('keywords.add_new'));
    }

    public function test_admin_can_access_create_new_hotel_button()
    {
        $this->refreshApplicationWithLocale('en');

        $response = $this->actingAs($this->admin, 'admin')->get(route('back.hotels.create'));

        $response->assertStatus(200);
    }

    public function test_non_admin_cannot_access_create_new_hotel_button()
    {
        $this->refreshApplicationWithLocale('en');

        $response = $this->actingAs($this->user, 'web')->get(route('back.hotels.create'));

        $response->assertStatus(302);
        $response->assertRedirect('/back/login');
    }

    // this below test passed if you use mysql and fail if u use sqlite

    public function test_create_new_hotel_with_image_successfully()
    {
        $this->refreshApplicationWithLocale('en');

        // Mock the storage
        Storage::fake('public');

        // Mock an uploaded image
        $image = UploadedFile::fake()->image('hotel_image.jpg');

        // Hotel data, including the image
        $hotelData = [
            'name' => 'La Plaza',
            'slug' => 'la-plaza',
            'description' => 'Great view, nice service',
            'location' => 'The River Nile',
            'image' => $image, // Pass the mock image
        ];

        // Simulate an admin user creating the hotel
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('back.hotels.store'), $hotelData);

        // Assert the request was successful and redirected correctly
        $response->assertStatus(302);
        $response->assertRedirect(route('back.hotels.index'));

        // Assert the image was stored correctly
        $imageNewName = time() . '_' . $image->getClientOriginalName();
        Storage::disk('public')->exists('hotels/' . $imageNewName);

        // Assert the database contains the hotel record with the renamed image
        $this->assertDatabaseHas('hotels', [
            'name' => 'La Plaza',
            'slug' => 'la-plaza',
            'description' => 'Great view, nice service',
            'location' => 'The River Nile',
            'image' => $imageNewName, // Check the renamed image in the database
        ]);
    }

    // public function test_create_new_hotel_with_image_successfully_sqlite()
    // {
    //     $this->refreshApplicationWithLocale('en');

    //     // Mock the timestamp
    //     $fixedTime = 1732299273; // Use a fixed timestamp
    //     Carbon::setTestNow(Carbon::createFromTimestamp($fixedTime)); // Set a fake "current time"

    //     Storage::fake('public');

    //     $image = UploadedFile::fake()->image('hotel_image.jpg');
    //     $hotelData = [
    //         'name' => 'La Plaza',
    //         'slug' => 'la-plaza',
    //         'description' => 'Great view, nice service',
    //         'location' => 'The River Nile',
    //         'image' => $image,
    //     ];

    //     $response = $this->actingAs($this->admin, 'admin')
    //         ->post(route('back.hotels.store'), $hotelData);

    //     $response->assertStatus(302);
    //     $response->assertRedirect(route('back.hotels.index'));

    //     // Verify image storage
    //     Storage::disk('public')->assertExists('hotels/' . $fixedTime . '_hotel_image.jpg');

    //     // Assert the database contains the correct record
    //     $this->assertDatabaseHas('hotels', [
    //         'name' => 'La Plaza',
    //         'slug' => 'la-plaza',
    //         'description' => 'Great view, nice service',
    //         'location' => 'The River Nile',
    //         'image' => $fixedTime . '_hotel_image.jpg',
    //     ]);

    //     Carbon::setTestNow(); // Reset the mocked time
    // }


    public function test_hotel_edit_contains_correct_value()
    {
        $this->refreshApplicationWithLocale('en');

        $hotel = Hotel::factory()->create();


        $response = $this->actingAs($this->admin, 'admin')->get(route('back.hotels.edit', $hotel->slug));

        $response->assertStatus(200);

        // Assert the view is correct
        $response->assertViewIs('back.hotels.edit');

        // Assert the correct data is passed to the view
        $response->assertViewHas('hotel', $hotel);
    }

    public function test_hotel_update_validation_error_redirects_back_to_form()
    {
        $this->refreshApplicationWithLocale('en');

        $hotel = Hotel::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')->put(route('back.hotels.update', $hotel->slug), [
            'name' => '',
            'description' => '',
            'location' => ''
        ]);

        $response->assertStatus(302);

        $response->assertSessionHasErrors(['name',  'location', 'description']);
    }
}
