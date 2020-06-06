<?php

use App\User;
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
            'name' => 'Yaser Nasser',
            'email' => 'yaser@admin.com',
            'password' => bcrypt('123456'),
            'profile_img' => 'profile_img1.jpg'
        ]);
    }
}
