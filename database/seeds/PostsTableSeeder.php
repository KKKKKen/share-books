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
            'body' => '本当に必要な武器を知ることが出来た。瀧本さんの本で一番お気に入りの一冊。',
            'user_id'=> '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => '君たちはどう生きるか',
            'body' => '人生について考えさせられる作品だった。',
            'user_id'=> '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => '真夏の方程式',
            'body' => '予想が出来ない面白い展開であった。親の愛情はどんなものよりも強いということを示唆していた。',
            'user_id'=> '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'PLAY・JOB',
            'body' => "本の冒頭から考えさせられる内容であったため載せておく\n

            この本は「常識はずれな行動」の重要性を説明している。「無茶をすること」がいかにあなたの人生を安定させるか。
            「まともじゃない方法」がなぜ論理的な方法よりもすぐれているのか。そんな矛盾について、
            偉大なビジネスマン・哲学者・アーティストたちの言葉や、新鮮で刺激的な作品、私の身近で起こった出来事などを例に、これから解説していきたい。
            この本はあなたが以前考えていたこと（たとえあなたが以前何を考えていたか、自分で知らなかったとしても）をめちゃくちゃに壊すだろう。
            そのかわり、いくつかの確信を与える。
            人生はもっとリスキーに生きた方がいいし、仕事はもっと面白おかしくやった方がいい。そして想像をはるかに越えるほど、
            自分はもっと自由で、適当で、でたらめな人間になった方がいい、という確信である。
            この本を読んだ後は、もう何かに悩んだり、迷ったりする必要はない。
            どうしても決められない時は、ただサイコロを振ればいいのだから。
            考え方は間違っている。が、勝つ方法としては正しい。"
            ,
            'user_id'=> '5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => "If YOU WANT TO BE Rich & Happy DON'T GO TO SCHOOL",
            'body' => "I was recommended to read this book by when I went to Australia.
             I learned something that is much more important than I was taught in school.",
            'user_id'=> '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => 'ランダムウォーク&行動ファイナンス理論のすべて',
            'body' => '人は都合のいいように解釈して自分を正当化するだが、大事なのはマーケットがそれをどう認識するかであり、自分の感情に従っていて上手くいくわけがない
            85%がランダムと言われる世界でいかに優位性を見出すか。 非常に参考になる本だった',
            'user_id'=> '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => '肌の悩みがすべてきえるたった１つの方法',
            'body' => '人間の自然療力の力をもっと信じてみよう、、、',
            'user_id'=> '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => '医学不要論',
            'body' => 'この本を読み180°価値観が変わった。西洋医学の本質は対処療法であり、根本的な治療には至らない。病症とは体の治癒反応であり、それを阻害するクスリは免疫力を下げるため、長期的に見ると害である。',
            'user_id'=> '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'title' => '金融の基本',
            'body' => '金融の基本を体系的に学べる本。今まで分からなかった金融緩和に関する理解が深まった。',
            'user_id'=> '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],



        
    ]);
    }
}
