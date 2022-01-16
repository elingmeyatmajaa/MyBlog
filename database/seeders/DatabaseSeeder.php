<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disbale foreign key constraints for users and enable it again.
        Schema::disableForeignKeyConstraints();
        \App\Models\Role::truncate();
        \App\Models\User::truncate();
        Schema::enableForeignKeyConstraints();

        // Create roles and users
        \App\Models\Role::factory(1)->create();
        \App\Models\User::factory(10)->create();
    }
}
