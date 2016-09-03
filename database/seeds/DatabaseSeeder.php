<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \CodeDelivery\Models\User;
use \CodeDelivery\Models\Client;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
         DB::statement("SET foreign_key_checks = 0");
        factory(User::class)->create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt(123456),
                'rules'=>'admin',
                'remember_token' => str_random(10),
            ]
        )->client()->save(factory(Client::class)->make());

        factory(User::class)->create(
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt(123456),
                'rules'=>'client',
                'remember_token' => str_random(10),
            ]
        )->client()->save(factory(Client::class)->make());
        $this->call(UserTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CupomTableSeeder::class);
        Model::reguard();
    }
}
