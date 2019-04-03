<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name'=> 'admin',
            'email'=>'admin@nahrim.gov.my',
            'password'=>bcrypt('nahrim@dmin')
           ]);
    }
}
