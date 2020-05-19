<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            ['name'=>'DailyShop','description'=>'mô tả','email'=>'email@gmail.com']
        ]);
    }
}
