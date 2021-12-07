<?php
// phpcs:disable
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'tag_title' => '数学',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '文学',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '英語',
        ]);
        DB::table('tags')->insert([
            'tag_title' => 'テクノロジー',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '物理'
        ]);
        DB::table('tags')->insert([
            'tag_title' => '化学',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '日本語',
        ]);
        DB::table('tags')->insert([
            'tag_title' => '他の',
        ]);
    }
}
