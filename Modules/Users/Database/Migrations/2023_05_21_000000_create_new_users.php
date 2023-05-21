<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Users\Entities\User;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;


class CreateNewUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo UsersDatabaseSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Users\\Database\\Seeders\\UsersDatabaseSeeder', '--force' => true));
        echo UsersDatabaseSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations. 
     * Warning: This revers removing all users from users table!
     *
     * @return void
     */
    public function down()
    {
        User::truncate();
    }
}
