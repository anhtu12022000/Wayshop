<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     ['name'=>'tên','email'=>'email@gmail.com','password'=>Hash::make('123456'),'address'=>'Hà nội','phone'=>'0912345678','gender'=>'Nam','image'=>'anc.png','status'=>1]
        // ]);
        
    }
}
