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
			'post_id' => 4,
            'range1' => '迷子レジェンド',
            'range2' => '迷子マスター',
            'range3' => '迷子アドバンス',
            'range4' => 'ほどほど迷子',
            'range5' => '迷子ルーキー',
            'range6' => '迷子脱落者',
            'range_text1' => 'アンタこそ迷子の中の迷子！アタシが全力でサポートするわ！！',
            'range_text2' => 'やるじゃない！アンタなかなかの迷子っぷりよ。アタシが友達になってあげるから安心しなさい！！',
            'range_text3' => 'アンタも結構苦労してんのね！やすこの道案内を使って、地図を手放す開放感を思い知りなさい！',
            'range_text4' => '人生迷走中ね！せめて現実の道では迷わないようにアタシが助けてあげるわ！',
            'range_text5' => '迷子レベルはまだまだね！でも、駆け出しとはいえ迷子は迷子。救う価値はあるわね。',
            'range_text6' => 'アンタが迷子を名乗るなんて100年早いわ！まぁでも、気が向いたら案内してあげるわよ。',
            'img_type' => 2,
        ]);
        DB::table('judgments')->insert([
            'post_id' => 2,
            'range1' => '関西人度100%',
            'range2' => '関西人度80%',
            'range3' => '関西人度60%',
            'range4' => '関西人度40%',
            'range5' => '関西人度20%',
            'range6' => '関西人度0%',
            'range_text1' => 'あなたの関西人度は100%！！　コッテコテの関西人やな！',
            'range_text2' => 'あなたの関西人度は80%！！　自分さすがやな！',
            'range_text3' => 'あなたの関西人度は60%！！ なかなかええやん！！',
            'range_text4' => 'あなたの関西人度は40%　自分それで関西人のつもりなん!?',
            'range_text5' => 'あなたの関西人度は20% エセ関西人やな！！！',
            'range_text6' => 'あなたの関西人度は0%　この東京かぶれめ！！',
        ]);
        DB::table('judgments')->insert([
            'post_id' => 1,
            'range1' => '関西人度100%',
            'range2' => '関西人度80%',
            'range3' => '関西人度60%',
            'range4' => '関西人度40%',
            'range5' => '関西人度20%',
            'range6' => '関西人度0%',
            'range_text1' => 'あなたの関西人度は100%！！　コッテコテの関西人やな！',
            'range_text2' => 'あなたの関西人度は80%！！　自分さすがやな！',
            'range_text3' => 'あなたの関西人度は60%！！ なかなかええやん！！',
            'range_text4' => 'あなたの関西人度は40%　自分それで関西人のつもりなん!?',
            'range_text5' => 'あなたの関西人度は20% エセ関西人やな！！！',
            'range_text6' => 'あなたの関西人度は0%　この東京かぶれめ！！',
        ]);
        DB::table('judgments')->insert([
            'post_id' => 3,
            'range1' => '地獄の苦しみを知っているデザイナー',
            'range2' => '苦労が麻痺しつつあるデザイナー',
            'range3' => '苦労性のデザイナー',
            'range4' => '苦労を知り始めたデザイナー',
            'range5' => '幸福なデザイナー',
            'range6' => '苦労知らずのデザイナー',
            'range_text1' => '酸いも甘いも知り尽くしたあなたには、もう怖いものはない…！',
            'range_text2' => 'もはや感覚が麻痺し始めた頃では…？時には息抜きを。',
            'range_text3' => '日々の業務おつかれさまです。同情を禁じ得ない…！',
            'range_text4' => 'ふふ…そんなのまだまだ序の口ですよ。',
            'range_text5' => '良いクライアントに恵まれているようですね。',
            'range_text6' => '苦労の「く」も知らないほど完璧なクライアントに恵まれているようです。',
            'img_type' => 2,
        ]);
        DB::table('judgments')->insert([
            'post_id' => 5,
            'range1' => '江戸っ子度100%',
            'range2' => '江戸っ子度80%',
            'range3' => '江戸っ子度60%',
            'range4' => '江戸っ子度40%',
            'range5' => '江戸っ子度20%',
            'range6' => '江戸っ子度0%',
            'range_text1' => 'おみごと！オマエさんこそちゃきちゃきの江戸っ子！',
            'range_text2' => 'おっ！やるじゃねぇか！なかなかの江戸っ子っぷりだ。',
            'range_text3' => 'てやんでい！生粋の江戸っ子と呼ぶにゃああと一歩足りねぇな！',
            'range_text4' => 'かー！話にならねぇな！！塩もってこい！',
            'range_text5' => '不勉強め！けつかっちんだぜ。',
            'range_text6' => 'べらんめぇ！おとといきやがれ！！',
        ]);
        DB::table('judgments')->insert([
            'post_id' => 6,
            'range1' => '天性の小悪魔',
            'range2' => '小悪魔',
            'range3' => '小悪魔予備軍',
            'range4' => '清純派女子',
            'range5' => 'ピュアな乙女',
            'range6' => '干物女',
            'range_text1' => 'アンタ、オトコの心のこと知り尽くしてるわね！？ 正真正銘の小悪魔よ！',
            'range_text2' => 'はい、出た小悪魔！そうやって男をたぶらかせてるの!?',
            'range_text3' => '小悪魔一歩手前よ！ 計算高い女なのはバレてるんだからね！',
            'range_text4' => '',
            'range_text5' => '純粋でピュアな心を持っているわね！',
            'range_text6' => '小悪魔どうこう以前に恋愛しなさい、この干物女！',
        ]);
    }
}