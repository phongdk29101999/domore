<?php
<<<<<<< HEAD
// phpcs:disable
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
=======

use Illuminate\Database\Seeder;
>>>>>>> c7e2262... Init project

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
<<<<<<< HEAD
            'email' => 'test1@example.com',
=======
            'email' => 'test1@gmail.com',
>>>>>>> c7e2262... Init project
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
<<<<<<< HEAD
            'email' => 'test2@example.com',
=======
            'email' => 'test2@gmail.com',
>>>>>>> c7e2262... Init project
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
        ]);
        DB::table('users')->insert([
<<<<<<< HEAD
            'first_name' => 'Aka',
            'last_name' => 'Kuro',
            'user_name' => 'admin ',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'akakuro@example.com',
            'phone' => '0941067198',
=======
            'first_name' => 'Thanh',
            'last_name' => 'Nguyen',
            'user_name' => 'admin ',
            'password' => Hash::make('123456'),
            'gender' => 'female',
            'birthday' => date('Y-m-d H:i:s',mt_rand(1, 2147385600)),
            'email' => 'nuhoangchenhac@gmail.com',
            'phone' => '0123456789',
>>>>>>> c7e2262... Init project
            'address' => Str::random(20),
            'job' => Str::random(10),
            'admin' => 1,
        ]);
<<<<<<< HEAD
=======
        DB::table('users')->insert([
            'first_name' => 'Dang Nam',
            'last_name' => 'Kieu',
            'user_name' => 'dangnam739',
            'password' => Hash::make('12345678'),
            'gender' => 'female',
            'birthday' => date('Y-m-d H:i:s', mt_rand(1, 2147385600)),
            'email' => 'kieudangnam@gmail.com',
            'phone' => '0123456789',
            'address' => Str::random(20),
            'job' => Str::random(10),
        ]);

>>>>>>> c7e2262... Init project
    }
}
