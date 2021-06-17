<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
        [
            'title' => '君たちに武器を配りたい',
            'body' => '本当に必要な武器を知ることが出来た',
            'user_id'=> '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],

        [
            'title' => '君たちはどう生きるか',
            'body' => '人生について考えさせられる作品だった',
            'user_id'=> '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => '真夏の方程式',
            'body' => '驚きの連続だった。',
            'user_id'=> '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
    ]);
    }
}
