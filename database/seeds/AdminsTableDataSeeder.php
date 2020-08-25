<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Ravi',
                'last_name' => 'Chauhan',
                'user_name' => 'ravi',
                'email'  => 'ravikumarrajput123@gmail.com',
                'password' => Hash::make('admin786'), // secret
                'contact' => 7500022885,
                'address' =>'Mohali',
                'status' => 1,
                'admin_type' => 0,
                'created_at' => time(),
            ],
        ];

        foreach ($users as $val) {
           $createduser =  Admin::Create($val);
        }
    }
}
