<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests whether a user can login with an email and password.
     *
     * Checks if the response to the login request is valid and contains the 'access_token' key,
     * indicating a successful authentication.
     */
    public function test_a_user_can_login_with_email_and_password(): void
    {
        $response = $this->postJson(route('user.login'), [
            'email' => 'admin@admin.com',
            'password' => '123456',
        ])->assertOk();

        $this->assertArrayHasKey('access_token', $response->json());
    }

    /**
     * Tests whether a user cannot log in with a wrong email and password.
     *
     * Performs a POST request to the 'user.login' route with incorrect login data
     * and asserts that the response has a status of 401 (Unauthorized), indicating
     * a failed login attempt.
     */
    public function test_a_user_can_login_with_wrong_email_and_password(): void
    {
        $this->postJson(route('user.login'), [
            'email' => 'wrongmail@domain.com',
            'password' => 'wrongpassword',
        ])->assertUnauthorized();
    }

    /**
     * Tests whether a user cannot log in without providing an email or password.
     *
     * Performs a POST request to the 'user.login' route without email and password
     * and asserts that the response has a status of 422 (Unprocessable Entity), indicating
     * a validation error.
     */
    public function test_a_user_cannot_login_without_email_and_password(): void
    {
        $this->postJson(route('user.login'), [
            'email' => '',
            'password' => '',
        ])->assertUnprocessable();
    }

    /**
     * Tests whether a user cannot log in with an incorrect email format.
     *
     * Performs a POST request to the 'user.login' route with an email in an incorrect format
     * and asserts that the response has a status of 422 (Unprocessable Entity), indicating
     * a validation error.
     */
    public function test_a_user_cannot_login_with_incorrect_email_format(): void
    {
        $this->postJson(route('user.login'), [
            'email' => 'invalidemail', // Invalid email format
            'password' => 'password',
        ])->assertUnprocessable();
    }

    /**
     * Tests whether a user cannot log in with a correct email but incorrect password.
     *
     * Performs a POST request to the 'user.login' route with a correct email but an incorrect password
     * and asserts that the response has a status of 401 (Unauthorized), indicating a failed login attempt.
     */
    public function test_a_user_cannot_login_with_correct_email_but_incorrect_password(): void
    {
        $this->postJson(route('user.login'), [
            'email' => 'admin@admin.com',
            'password' => 'incorrectpassword', // Incorrect password
        ])->assertUnauthorized();
    }
}
