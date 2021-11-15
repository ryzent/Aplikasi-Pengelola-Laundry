<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Status;
use App\Models\Outlet;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $outles = [
            [
                'nama' => 'Laundry Mega',
                'alamat' => 'Soklat',
                'tlp' => '0851569938759'
            ]
        ];
        foreach ($outles as $ot => $ots){
            Outlet::create($ots);
        }

        $statuses = [
            [
                'status' => 'Baru'
            ],
            [
                'status' => 'Proses'
            ],
            [
                'status' => 'Selesai'
            ],
            [
                'status' => 'Diambil'
            ]

        ];
        foreach ($statuses as $st => $sts){
            Status::create($sts);
        }

        $roles = [
            [
                'nama_role' => 'Super Admin'
            ],
            [
                'nama_role' => 'Admin'
            ],
            [
                'nama_role' => 'Kasir'
            ],
            [
                'nama_role' => 'Pemilik'
            ]

        ];
        foreach ($roles as $rl => $rls){
            Role::create($rls);
        }

        $users = [
            [
                'name' => 'Atha Nabil',
                'email' => 'thalalatha13@gmail.com',
                'role' => '1',
                'password' => bcrypt('coolhand021'),
                'id_outlet' => '1',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => '2',
                'password' => bcrypt('123456'),
                'id_outlet' => '1',
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@kasir.com',
                'role' => '3',
                'password' => bcrypt('123456'),
                'id_outlet' => '1',
            ],
            [
                'name' => 'Pemilik',
                'email' => 'owner@owner.com',
                'role' => '4',
                'password' => bcrypt('123456'),
                'id_outlet' => '1',
            ],
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }

    }
}
