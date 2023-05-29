<?php

namespace Modules\Users\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Modules\Users\Entities\User;

class UserService
{
    /**
     * Creating new user
     * 
     * @param array $userData
     * @return User
     */
    public function createUser(array $userData): User
    {
        return User::create($userData);
    }

    /**
     * Insert a new record into the password_reset_tokens table.
     *
     * @param string $email The email associated with the password reset token.
     * @param string $token The password reset token.
     * @return void
     */
    public function insertPasswordResetToken(string $email, string $token): void
    {
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Removing a record in the password_reset_tokens table.
     *
     * @param string $email The email associated with the password reset token.
     * @param string $token The password reset token.
     * @return void
     */
    public function deletePasswordResetToken(string $email, string $token): void
    {
        DB::table('password_reset_tokens')
            ->where('email', $email)
            ->delete();
    }

    /**     
     * Send a "forgot password" email to the specified email address.
     *
     * @param string $email The email address to send the email to.
     * @param string $token The password reset token.
     * @return void
     */
    public function sendForgotPasswordEmail(string $email, string $token): void
    {
        Mail::send('users::mails.forgot', ['token' => $token], function (Message $message) use ($email) {
            $message->to($email);
            $message->subject('Reset your password');
        });
    }

    /**
     * Check if the given token is valid for password reset.
     *
     * @param string $token The password reset token.
     * @return mixed|null The password reset record if the token is valid, otherwise null.
     */
    public function validatePasswordResetToken(string $token)
    {
        return DB::table('password_reset_tokens')->where('token', $token)->first();
    }

    /**
     * Get the user based on the email from the password reset record.
     *
     * @param string $email The email address of the user.
     * @return mixed|null The user record if the email exists, otherwise null.
     */
    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Update the password for the given user.
     *
     * @param User $user The user object.
     * @param string $password The new password.
     * @return bool True if the password update was successful, false otherwise.
     */
    public function updatePassword(User $user, string $password): bool
    {
        $user->password = Hash::make($password);
        return $user->save();
    }

    /**
     * Checking last sended email date. Returning true if 
     * date was less than count of hours passed in second param.
     *
     * @param string $email The new password.
     * @param int $hours The new password.
     * @return bool  Returning true if date was less than count of hours passed in second param.
     */
    public function lastEmailWasSendLessThan(string $email, int $hours): bool
    {
        $resetToken = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('created_at', '>=', Carbon::now()->subHours($hours)->toDateTimeString())
            ->first();

        return !is_null($resetToken);
    }
}
