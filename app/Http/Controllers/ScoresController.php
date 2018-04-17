<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;

class ScoresController extends Controller
{
	public function store(Request $request) {
        $score = new Score;
        $sum = 0;
        for ($i=1; $i <= 10; $i++) {
		if ($request->{'answer'.$i} == 1) {
        		$sum++;
        	}
        }
        $score->post_id = $request->post_id;
        $score->point = $sum * 10;
        $score->save();
        return redirect()->route('posts.result', ['post_id' => $score->post_id, 'score' => $score->point]);
    }
}
