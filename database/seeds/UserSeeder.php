<?php
// phpcs:disable
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'user_name' => 'test1',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'test1@example.com',
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'user_name' => 'test2',
            'password' => Hash::make('123456'),
            'gender' => 'female',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'test2@example.com',
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Phong',
            'last_name' => 'Kim',
            'user_name' => 'admin ',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'phong.dk176843@sis.hust.edu.vn',
            'phone' => '0941067198',
            'address' => Str::random(20),
            'job' => Str::random(10),
            'admin' => 1,
        ]);
    }
}
