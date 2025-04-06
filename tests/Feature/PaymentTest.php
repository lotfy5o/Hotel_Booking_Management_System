<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mcamara\LaravelLocalization\LaravelLocalization;
use App\Http\Middleware\CheckPayment;


class PaymentTest extends TestCase
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

        $this->withoutMiddleware(CheckPayment::class);
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

    public function test_payment_page_renders_correctly()
    {
        Session::put('price', 100);

        $response = $this->actingAs($this->admin, 'admin')->get(route('payment.show'));

        $response->assertStatus(200);
        $response->assertSee('paypal-button-container');
    }

    public function payment_page_requires_price_in_session()
    {
        // Forget the 'price' key from the session
        Session::forget('price');

        $response = $this->actingAs($this->admin, 'admin')->get(route('payment.show'));

        $response->assertStatus(403); // Blocked by middleware
    }

    public function test_successful_payment_approval_redirects_to_success_page()
    {
        Session::put('price', 100);

        $response = $this->actingAs($this->admin, 'admin')->get(route('payment.success'));

        $response->assertStatus(200);
        $response->assertViewIs('front.pay-pal-success');
    }



    public function test_protected_routes_block_unauthorized_access()
    {
        // Forget the 'price' key from the session
        Session::forget('price');

        // Attempt to access all payment routes
        $this->get(route('payment.show'))->assertStatus(302)->assertRedirect(route('login'));
        $this->get(route('payment.success'))->assertStatus(302)->assertRedirect(route('login'));
        $this->get(route('payment.cancel'))->assertStatus(302)->assertRedirect(route('login'));
    }

    // I can not simulate the paypal skd behavior
    public function test_database_updated_on_successful_payment()
    {
        // Simulate a session price before the test
        Session::put('price', 100);

        // Simulate the PayPal redirect after approval
        $response = $this->actingAs($this->admin, 'admin')->get('/payment/success?booking=12345'); // Assuming `booking` query param is part of the redirect URL

        // Assert that the response was successful
        $response->assertStatus(200);

        // Check if the booking was inserted into the database
        $this->assertDatabaseHas('bookings', [
            'email' => $this->user->email,
            'full_name' => $this->user->name,
            'price' => 100,
            'status' => 'booked',
            'user_id' => $this->user->id,
        ]);
    }
}
