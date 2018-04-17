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
            	'post_id' => 1,
            	'title' => $titles[$j],
                'order' => $i,
            ]);
        }
    }
}
