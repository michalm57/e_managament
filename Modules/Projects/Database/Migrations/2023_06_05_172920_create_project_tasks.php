<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Projects\Entities\ProjectTask;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo ProjectTasksSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Projects\\Database\\Seeders\\ProjectTasksSeeder', '--force' => true));
        echo ProjectTasksSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ProjectTask::truncate();
    }
};
