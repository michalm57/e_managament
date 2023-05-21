<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Entities\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertAdminUser();
        $this->insertRandomUsers(10);
    }

    /**
     * Inserting admin user into users table.
     *
     * @return void
     */
    public function insertAdminUser()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

     /**
     * Inserts random users in the number given in the parameter $countOfUsers
     *
     * @param int $countOfRandomUsers
     * @return void
     */
    public function insertRandomUsers($countOfUsers)
    {
        for ($i = 0; $i < $countOfUsers; $i++) {
            $userData = $this->generateRandomUser();

            User::create($userData);
        }
    }


    /**
     * Generating random user with Faker
     *
     * @param int $countOfRandomUsers
     * @return array
     */
    public function generateRandomUser()
    {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(10)),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
