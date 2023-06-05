<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Tasks\Entities\TaskUser;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        echo TasksUsersSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Tasks\\Database\\Seeders\\TasksUsersSeeder', '--force' => true));
        echo TasksUsersSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        TaskUser::truncate();
    }
};

