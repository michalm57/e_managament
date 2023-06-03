<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Tasks\Entities\TaskType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        echo TaskTypesSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Tasks\\Database\\Seeders\\TaskTypesSeeder', '--force' => true));
        echo TaskTypesSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        TaskType::truncate();
    }
};
