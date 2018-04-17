<?php

use Illuminate\Database\Seeder;

class JudgmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('judgments')->insert([
			'post_id' => 1,
            'range1' => '迷子レジェンド',
            'range2' => '迷子マスター',
            'range3' => '迷子アドバンス',
            'range4' => '迷子ルーキー',
            'range5' => '迷子脱落者',
            'range_text1' => 'アンタこそ迷子の中の迷子！アタシが全力でサポートするわ！！',
            'range_text2' => 'やるじゃない！アンタなかなかの迷子っぷりよ。アタシが友達になってあげるから安心しなさい！！',
            'range_text3' => 'アンタも結構苦労してんのね！やすこの道案内を使って、地図を手放す開放感を思い知りなさい！',
            'range_text4' => '迷子レベルはまだまだね！でも、駆け出しとはいえ迷子は迷子。救う価値はあるわね。',
            'range_text5' => 'アンタが迷子を名乗るなんて100年早いわ！まぁでも、気が向いたら案内してあげるわよ。',
        ]);
    }
}