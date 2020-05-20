<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            ['id'=>1,'title'=>'Sale 20%','slug'=>Str::slug('sale 20'),'image'=>'image.png'],
            ['id'=>2,'title'=>'Sale 10%','slug'=>Str::slug('sale 10'),'image'=>'image.png']
        ]);
    }
}


