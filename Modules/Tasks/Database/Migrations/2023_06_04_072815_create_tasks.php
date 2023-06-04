<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Tasks\Entities\Task;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        echo TasksDatabaseSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Tasks\\Database\\Seeders\\TasksDatabaseSeeder', '--force' => true));
        echo TasksDatabaseSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Task::truncate();
    }
};

