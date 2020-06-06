<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' =>'html tutorials',
            'slug' =>'html-tutorials',
        ]);
        Category::create([
            'name' =>'css tutorials',
            'slug' =>'css-tutorials',
        ]);
        Category::create([
            'name' =>'bootstrap tutorials',
            'slug' =>'bootstrap-tutorials',
        ]);
        Category::create([
            'name' =>'java tutorials',
            'slug' =>'java-tutorials',
        ]);
        Category::create([
            'name' =>'javascript tutorials',
            'slug' =>'javascript-tutorials',
        ]);
        Category::create([
            'name' =>'laravel tutorials',
            'slug' =>'laravel-tutorials',
        ]);
        Category::create([
            'name' =>'vue js tutorials',
            'slug' =>'vue-js-tutorials',
        ]);
        Category::create([
            'name' =>'react tutorials',
            'slug' =>'react-tutorials',
        ]);
        Category::create([
            'name' =>'ruby tutorials',
            'slug' =>'ruby-tutorials',
        ]);
    }
}
