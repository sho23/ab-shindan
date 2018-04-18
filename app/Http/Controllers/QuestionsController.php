<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Question;
use App\Post;
use App\Judgment;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        $post = DB::table('posts')->where('id', $post_id)->first();
        return view('questions.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;
        $questions = [];
        for ($i=1; $i <= 10; $i++) {
            $this->validate($request, [
               'question' . $i => 'required|max:255',
            ]);
            $data = [];
            $data = [
                'post_id' => $request->post_id,
                'title' => $request->{'question'.$i},
                'order' => $i
            ];
            $questions[] = $data;
        }
        Question::insert($questions);

        DB::table('judgments')->insert(
            ['post_id' => $request->post_id]
        );
        $post = Post::find($request->post_id);
        $post->open_flag = true;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $user = \Auth::user();
        $questions = DB::table('questions')->where('post_id', $postId)->get();
        return view('questions.edit', compact('questions', 'postId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $questions = DB::table('questions')->where('post_id', $postId)->get();

        $qIdList = [];
        foreach ($questions as $question) {
            $qIdList[] = $question->id;
        }

        $questions = [];
        foreach ($qIdList as $key => $qId) {
            $this->validate($request, [
               'question' . $qId => 'required|max:255',
            ]);
            $question = Question::find($qId);
            $question->post_id =  $postId;
            $question->title = $request->{'question'.$qId};
            $question->order = $key +1;
            $question->save();
        }
        return redirect()->route('questions.edit', $postId)->with('succeed', '編集が完了しました');
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
