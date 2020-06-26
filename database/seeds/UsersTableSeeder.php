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
//        DB::table('users')->insert([
//            [
//                'account' => 'admin1',
//                'name' => 'ADMIN1',
//                'phone' => '02132132111',
//                'email' => 'admin1@gmail.com',
//                'level' => User::ADMIN,
//                'is_active' => User::ACTIVE,
//                'password' => bcrypt('admin'),
//                'address' => 'Hà Nội',
//            ],
//        ]);
        DB::table('customers')->delete();
        DB::table('orders')->delete();
        DB::table('order_product')->delete();
        DB::table('order_sources')->delete();
        DB::table('products')->delete();
        DB::table('product_supplier')->delete();
        DB::table('product_type')->delete();
        DB::table('statuses')->delete();
        DB::table('suppliers')->delete();
        DB::table('transports')->delete();
        DB::table('types')->delete();
    }
}
