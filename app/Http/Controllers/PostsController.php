<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('home.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $questions = DB::table('questions')
                ->where('post_id', $id)
                ->orderBy('order', 'asc')
                ->get();
        $scores = DB::table('scores')
                ->where('post_id', $id)
                ->get();
        $count = $scores->count();
        $avg =  round($scores->avg('point'));
        return view('posts.show', compact('post', 'questions', 'count', 'avg'));
    }

    public function result($id, $score)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $judgment = DB::table('judgments')->where('post_id', $id)->first();
        $ranges = [];
        if ($score <= 20) {
            $range = 5;
        } elseif ($score > 20 && $score <= 40) {
            $range = 4;
        } elseif ($score > 40 && $score <= 60) {
            $range = 3;
        } elseif ($score > 60 && $score <= 80) {
            $range = 2;
        } else {
            $range = 1;
        }
        return view('posts.result', compact('post', 'judgment', 'range'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
