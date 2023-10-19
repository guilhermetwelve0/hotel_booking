<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    use RefreshDatabase;

    // Testes para rotas públicas
    public function testLandingPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testAboutPage()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function testBlogPage()
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
    }

    public function testContactPage()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function testGuestBookingPage()
    {
        $response = $this->get('/guest-booking');
        $response->assertStatus(200);
    }

    public function testChangeGuestPage()
    {
        $response = $this->get('/change-guest');
        $response->assertStatus(200);
    }

    public function testRoomListPage()
    {
        $response = $this->get('/room-list');
        $response->assertStatus(200);
    }

    // Testes para rotas AJAX
    public function testAjaxSearchRooms()
    {
        $response = $this->get('/ajax/search-rooms');
        $response->assertStatus(200);
    }

    public function testAjaxUpdateStatus()
    {
        $response = $this->get('/ajax/update-status');
        $response->assertStatus(200);
    }

    // Testes para rotas que requerem autenticação
    public function testProfilePage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/profile');
        $response->assertStatus(200);
    }

    // Testes para rotas no prefixo /admin que requerem autenticação e verificação
    public function testAdminBookingCanceledList()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/booking/canceled-list');
        $response->assertStatus(200);
    }

    public function testAdminRoomTypeInfo()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/room-info/room-type');
        $response->assertStatus(200);
    }

    public function testAdminRoomInfo()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/room-info/room');
        $response->assertStatus(200);
    }

    public function testAdminServiceFacilityInfo()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/room-info/service-facility');
        $response->assertStatus(200);
    }

    public function testAdminSettingIndex()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/setting');
        $response->assertStatus(200);
    }

    public function testAdminDashboardIndex()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertStatus(200);
    }

    public function testAdminDashboardChart()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $response = $this->actingAs($user)->get('/admin/dashboard/chart');
        $response->assertStatus(200);
    }
}
