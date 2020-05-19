<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            ['name'=>'Tên','email'=>'email@gmail.com','title'=>'tiêu đề','body'=>'nội dung']
        ]);
    }
}
