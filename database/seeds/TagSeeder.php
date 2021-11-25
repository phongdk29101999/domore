<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tag_title' => 'IOS',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Android',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'NLP',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Computer Vision',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Machine Learning'
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'PHP',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Laravel',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Java',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Web',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Web Application',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Python',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Network',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'IoT',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'VueJS',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'NodeJS',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'Ruby on Rails',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'IT Tips',
        ]);
    }
}
