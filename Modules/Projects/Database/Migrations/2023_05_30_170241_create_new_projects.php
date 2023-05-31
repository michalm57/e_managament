<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Projects\Database\Seeders\ProjectsDatabaseSeeder;
use Modules\Projects\Entities\Project;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        echo ProjectsDatabaseSeeder::class . " - running start\n";
        Artisan::call('db:seed', array('--class' => 'Modules\\Projects\\Database\\Seeders\\ProjectsDatabaseSeeder', '--force' => true));
        echo ProjectsDatabaseSeeder::class . " - seeding completed\n";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Project::truncate();
    }
};
