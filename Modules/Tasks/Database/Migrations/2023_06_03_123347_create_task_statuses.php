<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Tasks\Database\Seeders\TaskStatusesSeeder;
use Modules\Tasks\Entities\TaskStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        echo TaskStatusesSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Tasks\\Database\\Seeders\\TaskStatusesSeeder', '--force' => true));
        echo TaskStatusesSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        TaskStatus::truncate();
    }
};

