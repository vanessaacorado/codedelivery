<?php

use Illuminate\Database\Seeder;
use \CodeDelivery\Models\User;
use \CodeDelivery\Models\Client;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
         factory(User::class, 10)->create()->each(function ($c){        
                $c->client()->save(factory(Client::class)->make());
        
            
        }); 
        
        factory(User::class, 3)->create(
            ['rules'=>'deliveryman']
        
        );
    }
}
