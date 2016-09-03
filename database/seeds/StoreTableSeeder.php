<?php

use Illuminate\Database\Seeder;
use ConfiraJa\Models\Store;
class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Store::class, 10)->create();
    }
}
