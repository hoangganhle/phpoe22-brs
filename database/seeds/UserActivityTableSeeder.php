<?php

use Illuminate\Database\Seeder;

class UserActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User_activity::class, 10)->create();
    }
}
