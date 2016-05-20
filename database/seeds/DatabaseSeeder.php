<?php

use Illuminate\Database\Seeder;
use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeTags\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(Category::class,10)->create();
        factory(Tag::class,10)->create();
    }
}
