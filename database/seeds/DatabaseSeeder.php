<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(CateAndProductTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
