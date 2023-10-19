<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Booking;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    private $controller;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new PageController();
    }

    public function test_landingPage_shouldReturnStatus200()
    {
        $response = $this->get('/landing');
        $response->assertStatus(200);
        $response->assertSee('Best Rooms');  // Supondo que 'Best Rooms' é um texto esperado na página
    }

    public function test_aboutPage_shouldReturnStatus200()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_contactPage_shouldReturnStatus200()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_guestInfoAdd_shouldRedirectToGuestBookingIfGuestDoesNotExist()
    {
        Session::forget('guest_id');
        $request = $this->createGuestRequest();
        $response = $this->callActionWithRequest('guestInfoAdd', $request);
        $response->assertRedirect('guest-booking');
    }

    public function test_guestInfoAdd_shouldRedirectToGuestBookingIfGuestExists()
    {
        $guest = $this->createGuest();
        Session::put('guest_id', $guest->id);
        $request = $this->createGuestRequest();
        $response = $this->callActionWithRequest('guestInfoAdd', $request);
        $response->assertRedirect('guest-booking');
    }

    public function test_guestBooking_shouldReturnStatus200()
    {
        $guest = $this->createGuest();
        Session::put('guest_id', $guest->id);
        $response = $this->callAction('guestBooking');
        $response->assertStatus(200);
    }

    public function test_guestBookingAdd_shouldRedirectToLanding()
    {
        $guest = $this->createGuest();
        Session::put('guest_id', $guest->id);
        $request = $this->createBookingRequest();
        $response = $this->callActionWithRequest('guestBookingAdd', $request);
        $response->assertRedirect('landing');
    }

    public function test_changeGuest_shouldRemoveSessionAndRedirectToGuestBooking()
    {
        $guest = $this->createGuest();
        Session::put('guest_id', $guest->id);
        $response = $this->callAction('changeGuest');
        $response->assertRedirect('guest-booking');
        $this->assertNull(session('guest_id'));
    }

    public function test_roomList_shouldReturnStatus200()
    {
        $response = $this->callAction('roomList');
        $response->assertStatus(200);
    }

    protected function callAction($actionName)
    {
        return $this->controller->{$actionName}();
    }

    protected function callActionWithRequest($actionName, $request)
    {
        return $this->controller->{$actionName}($request);
    }

    protected function createGuestRequest(array $data = [])
    {
        return new Request(array_merge([
            'name' => 'Nome do Convidado',
            'email' => 'email@example.com',
        ], $data));
    }

    protected function createBookingRequest(array $data = [])
    {
        return new Request(array_merge([
            'guest_id' => 1,  // Considere substituir 1 por $guest->id
            'check_in_date' => '2023-10-15',
            'check_out_date' => '2023-10-20',
        ], $data));
    }

    protected function createGuest(array $data = [])
    {
        return Guest::factory()->create($data);
    }
}
