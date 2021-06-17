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
            'name' => 'Tkakeshi',
            'email' => 'test@test.com',
            // 'email_verified_at'  => '',
            // email_verified_atって何？
            'password' => Hash::make('password1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 2,
            'name' => 'Akari',
            'email' => 'test2@test.com',
            // 'email_verified_at'  => '',
            // email_verified_atって何？
            'password' => bcrypt('password1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
     ]);
    }
}
