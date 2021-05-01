<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory(\App\User::class, 1)->create();
         factory(\App\Employee::class, 5)->create();
//        factory(Supplier::class, 5)->create();
    }
}
