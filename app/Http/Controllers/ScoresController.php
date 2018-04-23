<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Score;

class ScoresController extends Controller
{
	public function store(Request $request) {
        $questions = DB::table('questions')->where('post_id', $request->post_id)->get();

        $sum = 0;
        foreach ($questions as $key => $question) {
            $i = $key + 1;
            if ($question->invert_flag) {
                if ($request->{'answer'.$i} != 1) {
                    $sum++;
                }
            } else {
                if ($request->{'answer'.$i} == 1) {
                    $sum++;
                }
            }
        }
        $score = new Score;
        $score->post_id = $request->post_id;
        if (count($questions) === 5) {
            $score->point = $sum * 10;
        } else {
            $score->point = $sum * 5;
        }
        $score->save();
        return redirect()->route('posts.result', ['post_id' => $score->post_id, 'score' => $score->point]);
    }
}
