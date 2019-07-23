<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = "admin";
        $admin->username = "admin";
        $admin->email = "admin@gmail.com";
        $admin->email_verified_at = now();
        $admin->password = '$2y$12$n8ycKCr8cDTWtR.zahrHAuEjbuUWz0fNoeWpkIcgI8uPafLQOY1h.'; // admin
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new User();
        $admin->name = "User Test";
        $admin->username = "user";
        $admin->email = "user@gmail.com";
        $admin->email_verified_at = now();
        $admin->password = '$2y$12$n8ycKCr8cDTWtR.zahrHAuEjbuUWz0fNoeWpkIcgI8uPafLQOY1h.'; // user
        $admin->remember_token = str_random(10);
        $admin->save();
    }
}
