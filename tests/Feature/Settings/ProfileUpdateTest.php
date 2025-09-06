<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(route('profile.edit'));

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch(route('profile.update'), [
                'name' => 'Test User!!',
                // Email changing is disabled in this kit. You can uncomment in ProfileUpdateRequest and here to enable this.
                // 'email' => 'test@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertSessionHas('toast-success', 'Profile updated')
            ->assertRedirect(route('profile.edit'));

        $user->refresh();

        $this->assertSame('Test User!!', $user->name);
        // Email changing is disabled in this kit. You can uncomment in ProfileUpdateRequest and here to enable this.
        // $this->assertSame('test@example.com', $user->email);
        // The kit requires user verification. Disable that on the user model and then uncomment here if you don't want that.
        // $this->assertNull($user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch(route('profile.update'), [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('profile.edit'));

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('profile.destroy'), [
                'delete_account_password' => 'password',
            ]);

        $response->assertSessionHasNoErrors()
            ->assertSessionHas('toast-success', 'Profile deleted')
            ->assertHeader('HX-Redirect', route('welcome'));

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from(route('profile.edit'))
            ->delete(route('profile.destroy'), [
                'delete_account_password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrors('delete_account_password')
            ->assertRedirect(route('profile.edit'));

        $this->assertNotNull($user->fresh());
    }
}
