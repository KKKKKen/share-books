<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        [
            'id' => 1,
            'name' => 'Takahashi_administrator',
            // 'avatar'=> 'storage/avatar/cat.jpg',
            // 'avatar'=> 'public/storage/avatar/cat.jpg',
            // 'avatar'=> "user_default.jpg",
            'avatar'=>'cat.jpg',
            // asset('/storage/avatar/'.(auth()->user()->avatar ?? 'user_default.jpg')
            'email' => 'test@test.com',
            // 'email_verified_at'  => '',
            // email_verified_atって何？
            'password' => Hash::make('password1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 2,
            'name' => 'Akira',
            'avatar'=>"rose.jpg",
            'email' => 'test2@test.com',
            'password' => bcrypt('password1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 3,
            'name' => '松本',
            'avatar'=>"chart.jpg",
            'email' => 'test3@test.com',
            'password' => bcrypt('password1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 6,
            'name' => 'Christina',
            'avatar'=>"christina.jpg",
            'email' => 'test6@test.com',
            'password' => bcrypt('password1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ]);
        DB::table('users')->insert([

            [
                'id' => 4,
                'name' => 'Yuri',
                'email' => 'test4@test.com',
                'password' => bcrypt('password1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => '岡田',
                'email' => 'test5@test.com',
                'password' => bcrypt('password1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);

        
     
    }
}
