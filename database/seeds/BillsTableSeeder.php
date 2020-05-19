<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            ['id'=>1,'name'=>'Tên','email'=>'email@gmail.com','phone'=>'0912345678','address'=>'Hà Nội','total'=>'1000000000','note'=>'ghi chú','shiping'=>'30000','status'=>1]
        ]);
        
        DB::table('billDetail')->insert([
            ['bill_id'=>1,'product_id'=>1,'price'=>5000000,'quantity'=>1],
            ['bill_id'=>1,'product_id'=>1,'price'=>5000000,'quantity'=>1]
        ]);
    }
}
