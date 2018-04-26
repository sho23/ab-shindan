<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '関西人診断',
            'detail' => 'あなたがどれぐらい関西人かを診断します',
            'open_flag' => true,
            'pickup_flag' => 1
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '関西人診断その２',
            'detail' => 'あなたがどれぐらい関西人かを診断します',
            'open_flag' => true,
            'pickup_flag' => 0,
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '苦労性デザイナー診断',
            'detail' => 'デザイナーのあなたの苦労度合いを診断します',
            'key_color' => 'green',
            'open_flag' => true,
            'pickup_flag' => 1
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'やすこの迷子診断',
            'detail' => '迷子のレベルを診断します',
            'jump_url' => 'http://yasuko-guidemap.strikingly.com/',
            'jump_text' => 'オネエがアンタをナビゲート',
            'open_flag' => true,
            'pickup_flag' => 1
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '江戸っ子度診断',
            'key_color' => 'blue',
            'detail' => 'チャキチャキ？にわか…？あなたの江戸っ子度合いを診断します。',
            'open_flag' => true
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '小悪魔診断',
            'key_color' => 'blue',
            'detail' => 'あなたの小悪魔度合いを診断します',
            'open_flag' => true
        ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'モテ度診断(女性編)',
        //     'detail' => 'あなたがどれぐらいモテるか診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'シェアハウス診断',
        //     'detail' => 'シェアハウスに住むのに向いているか診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '性格イケメン度診断',
        //     'key_color' => 'green',
        //     'detail' => 'ルックスは関係ない!?性格がイケメンかどうかを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '無人島サバイバル診断',
        //     'detail' => 'あなたが無人島から生きて帰られるか診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'デブ診断',
        //     'key_color' => 'green',
        //     'detail' => 'あなたのデブ度を測定します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '肉好き診断',
        //     'key_color' => 'green',
        //     'detail' => '肉好き度合いを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'チャラ男診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたのチャラさを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '小悪魔診断',
        //     'detail' => 'あなたの小悪魔度合いを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'おしゃれ診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたのおしゃれ度を診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'Yotuber診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたがYotuberに向いているかを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '3日坊主診断',
        //     'key_color' => 'green',
        //     'detail' => 'あなたの忍耐力を診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '精神年齢診断',
        //     'detail' => 'あなたの精神年齢を診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'テレビっ子診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたのテレビっ子度を診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'ゲーマー診断',
        //     'detail' => 'ゲーマー度合いを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '国際人診断',
        //     'detail' => '国際人度合いを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'A型診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたがA型かどうかを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'O型診断',
        //     'detail' => 'あなたがO型かどうかを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'AB型診断',
        //     'detail' => 'あなたがAB型がどうかを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'デザイナー診断',
        //     'key_color' => 'green',
        //     'detail' => 'あなたがデザイナーかどうかを診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'レンジャー診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたが何レンジャーか診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => '映画オタク診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたが映画オタクか診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'コーヒー依存度診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたのコーヒー依存度を診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'ジブリ好き診断',
        //     'key_color' => 'blue',
        //     'detail' => 'あなたのジブリ好き度を診断します',
        //     'open_flag' => true
        // ]);
        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'はまっこ診断',
        //     'key_color' => 'green',
        //     'detail' => 'あなたがはまっこかを診断します',
        //     'open_flag' => true
        // ]);
    }
}
