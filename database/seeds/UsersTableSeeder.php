<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'account' => 'admin1',
                'name' => 'ADMIN1',
                'phone' => '02132132111',
                'email' => 'admin1@gmail.com',
                'level' => User::ADMIN,
                'is_active' => User::ACTIVE,
                'password' => bcrypt('admin'),
                'address' => 'Hà Nội',
            ],
        ]);
    }
}
