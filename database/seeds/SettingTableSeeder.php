<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
   
    public function run()
    {
        $settings = new Setting;
        $settings->website_name = 'CourseCenter';
        $settings->website_desc = 'Welcome To Course Center Your Way To Learn Perfect';
        $settings->website_email = 'coursecenter@gmail.com';
        $settings->website_address = 'El Mohandeseen , Cairo , Egypt';
        $settings->website_phone = '01045879654';
        $settings->save();
    }
}
