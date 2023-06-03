<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Projects\Database\Seeders\ProjectsUsersSeeder;
use Modules\Projects\Entities\ProjectUser;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo ProjectsUsersSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Projects\\Database\\Seeders\\ProjectsUsersSeeder', '--force' => true));
        echo ProjectsUsersSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ProjectUser::truncate();
    }
};
