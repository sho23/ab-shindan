<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$titles = [
    		'最初に進む方向が99％の確率で逆。しかも相当歩いてからじゃないと気づかない。',
	    	'紙の地図はグルグル回して見ないとわからない。しかし回しても現在地が見つからない。',
	    	'待ち合わせ時には30分くらい迷子時間を加味して出発する。',
	    	'人に道を聞く時は曲がり角ごとに聞く。',
	    	'「現地集合」って言葉が悪魔の所業に聞こえる。',
	    	'心の底では地図強者に対して劣等感と罪悪感を感じている。',
	    	'知りたいのは東西南北じゃなくて、自分から見て右か左か。',
	    	'飲み会でタバコを買いに出たら、元いた場所に戻れなくなる。',
	    	'1度覚えた道でも朝か夜かで見知らぬ道になってることがある。',
	    	'地図アプリがあっても迷わないわけがない！！'
	    ];
    	for ($i=1; $i <= 10; $i++) {
    		$j = $i - 1;
            DB::table('questions')->insert([
                'post_id' => 4,
            	'title' => $titles[$j],
                'order' => $i,
            ]);
        }

       $titles = [
            ['行けたら行くはいかない', 0],
            ['話し始めは「ちゃうねん」', 0],
            ['今川焼き、回転焼き、大判焼き、一番しっくりくるのは今川焼き', 1],
            ['語尾に「知らんけど」をつけて話す', 0],
            ['モータープールと言われてなにかわかる', 0],
        ];
        foreach ($titles as $key => $title) {
            DB::table('questions')->insert([
                'post_id' => 2,
                'title' => $title[0],
                'order' => $key + 1,
                'invert_flag' => $title[1],
            ]);
        }

       $titles = [
            ['マクドナルドをマクドと略す', 0],
            ['「アホやな～」と言われても特にムカつかない', 0],
            ['ぶっちゃけ関西人は全員面白い人種やと思っている', 1],
            ['イカ焼きといえばイカの姿焼き', 1],
            ['「放出駅」の読み方は「ほうしゅつ駅」', 1],
        ];
        foreach ($titles as $key => $title) {
            DB::table('questions')->insert([
                'post_id' => 1,
                'title' => $title[0],
                'order' => $key + 1,
                'invert_flag' => $title[1],
            ]);
        }

       $titles = [
            ['お任せします"のワードが信用できない', 0],
            ['余白の美しさをクライアントの一言で台無しにされたことがある', 0],
            ['白とグレーの市松模様が「透明」に見える', 0],
            ['クライアントからの提供画像はいつでも高解像度', 1],
            ['「思いついちゃったんですけど…」に殺意を感じる', 0],
        ];
        foreach ($titles as $key => $title) {
            DB::table('questions')->insert([
                'post_id' => 3,
                'title' => $title[0],
                'order' => $key + 1,
                'invert_flag' => $title[1],
            ]);
        }

       $titles = [
            ['ものを片付けないで、「片す」', 0],
            ['知り合いのオジサンに１人くらいは一人称が「オイラ」な人がいる', 0],
            ['東京タワーが大好き', 1],
            ['布団を「ひく」のか「しく」のかで悩んだことがある', 0],
            ['生まれを名乗ると「ちゃきちゃき？」と聞かれることにうんざりしている', 0],
        ];
        foreach ($titles as $key => $title) {
            DB::table('questions')->insert([
                'post_id' => 5,
                'title' => $title[0],
                'order' => $key + 1,
                'invert_flag' => $title[1],
            ]);
        }

       $titles = [
            ['今まで付き合った相手のほとんどは向こうからの告白で付き合った', 0],
            ['同性より異性の友だちのほうが多い', 0],
            ['アネゴ肌とよく言われる', 1],
            ['LINEでよくハートマークを使う', 0],
            ['真面目でつまらない人、チャラくておもしろい人付き合うなら後者', 0],
        ];
        foreach ($titles as $key => $title) {
            DB::table('questions')->insert([
                'post_id' => 6,
                'title' => $title[0],
                'order' => $key + 1,
                'invert_flag' => $title[1],
            ]);
        }
    }
}
