<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role admin 
        $adminRole = new Role(); 
        $adminRole->name = "admin"; 
        $adminRole->display_name = "Admin"; 
        $adminRole->save();

        // Membuat role member 
        $kasirRole = new Role(); 
        $kasirRole->name = "kasir"; 
        $kasirRole->display_name = "Kasir"; 
        $kasirRole->save();

        // Membuat sample admin 
        $admin = new User(); 
        $admin->name = 'Admin'; 
        $admin->email = 'admin@gmail.com'; 
        $admin->password = bcrypt('rahasia'); 
        $admin->save(); 
        $admin->attachRole($adminRole);

        // Membuat sample member 
        $kasir = new User(); 
        $kasir->name = "Kasir"; 
        $kasir->email = 'kasir@gmail.com'; 
        $kasir->password = bcrypt('rahasia'); 
        $kasir->save(); 
        $kasir->attachRole($kasirRole);


    }
}
