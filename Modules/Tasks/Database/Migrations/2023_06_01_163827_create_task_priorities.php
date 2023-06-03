<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Projects\Database\Seeders\TaskPrioritiesSeeder;
use Modules\Tasks\Entities\TaskPriority;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        echo TaskPrioritiesSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Tasks\\Database\\Seeders\\TaskPrioritiesSeeder', '--force' => true));
        echo TaskPrioritiesSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        TaskPriority::truncate();
    }
};
