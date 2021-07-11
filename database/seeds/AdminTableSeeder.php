<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    
    public function run()
    {
        
        $admin = new Admin;
        $admin->name = 'admin developer';
        $admin->phone = '01096217092';
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt('123456');
        $admin->save();

    }
}
