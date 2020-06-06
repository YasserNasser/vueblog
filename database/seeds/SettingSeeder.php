<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
           'site_name' => 'LaraVue Blog',
           'contact_email' => 'contact@us.com',
           'address' => 'Istanbul Fatih Topkapi 26/7 seyhulislam SK.',

        ]);
    }
}
