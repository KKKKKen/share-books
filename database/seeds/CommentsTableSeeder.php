<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->insert([
        [
            'post_id' => 1,
            'user_id' =>1,
            'body' => 'まさに強力な武器をくれました',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        ]);
    }
}
