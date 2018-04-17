<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;

class ScoresController extends Controller
{
	public function store(Request $request) {
        $score = new Score;
        $sum = 0;
        $answer1 = $request->answer1;
        $answer2 = $request->answer2;
        $answer3 = $request->answer3;
        $answer4 = $request->answer4;
        $answer5 = $request->answer5;
        $answer6 = $request->answer6;
        $answer7 = $request->answer7;
        $answer8 = $request->answer8;
        $answer9 = $request->answer9;
        $answer10 = $request->answer10;
        for ($i=1; $i <= 10; $i++) {
        	if (${'answer'.$i} == 1) {
        		$sum++;
        	}
        }
        $score->post_id = $request->post_id;
        $score->point = $sum * 10;
        $score->save();
        return redirect('/');
    }
}
