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
            'title' => 'やすこの迷子診断',
            'detail' => '迷子のレベルを診断します',
            'jump_url' => 'http://google.com',
            'jump_text' => 'オネエがアンタをナビゲート',
            'open_flag' => true
        ]);
    }
}
