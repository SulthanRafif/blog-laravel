<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'AdminRole',
            'name' => 'Admin Role',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'username' => 'UserRole',
            'name' => 'User Role',
            'email' => 'user@role.test',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');
    }
}
