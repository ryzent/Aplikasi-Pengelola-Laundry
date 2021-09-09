<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@kasir.com',
                'role' => 'kasir',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Pemilik',
                'email' => 'owner@owner.com',
                'role' => 'owner',
                'password' => bcrypt('123456'),
            ],
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
