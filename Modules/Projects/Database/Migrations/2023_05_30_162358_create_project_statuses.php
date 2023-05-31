<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Projects\Entities\ProjectStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        echo ProjectStatusesDatabaseSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Projects\\Database\\Seeders\\ProjectStatusesDatabaseSeeder', '--force' => true));
        echo ProjectStatusesDatabaseSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        ProjectStatus::truncate();
    }
};
