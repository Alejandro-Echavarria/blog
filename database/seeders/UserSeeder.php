<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Manuel Alejandro Echavarria Taveras',
            'email' => 'echavarria_007@hotmail.com',
            'password' => bcrypt('manuel0.3')
        ]);
        User::factory(9)->create();
    }
}
