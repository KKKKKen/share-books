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
            'user_id' =>2,
            'body' => '10年ほど前の本ですが現時点でも役立つ本質的な事を伝えてくれていますよね。瀧本さんの『戦略がすべて』もオススメです！',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'post_id' => 1,
            'user_id' =>1,
            'body' => 'オススメの紹介ありがとうございます！読んでみたいと思います！',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'post_id' => 3,
            'user_id' =>2,
            'body' => 'なんとも言えない終わり方ですよね笑',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'post_id' => 4,
            'user_id' =>3,
            'body' => '勝つ方法としては正しい。か、、なるほどです',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'post_id' => 5,
            'user_id' =>1,
            'body' => "The title of this book is so thrilling isn't it?",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        ]);
    }
}
