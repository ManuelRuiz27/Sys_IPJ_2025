<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_is_redirected_to_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect('/admin');
    }

    public function test_bienestar_user_is_redirected_to_bienestar_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'bienestar']);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect('/bienestar');
    }
}
