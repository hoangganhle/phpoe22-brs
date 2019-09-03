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
        factory(App\Model\UserActivity::class, 10)->create();
    }
}
