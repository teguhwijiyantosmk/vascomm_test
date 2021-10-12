<?php

use App\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
           'name' => 'Mr. Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$TrtAXVB5OpKBHW1cB78Lo.jx7BMMhHghsY0GqxEsOi8x6z/qqwvEa', // admin123
        ]);
    }
}
