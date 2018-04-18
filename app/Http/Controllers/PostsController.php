<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'result']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $posts = DB::table('posts')
                ->where('user_id', $user->id)
                ->orderBy('id', 'asc')
                ->get();
        return view('posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'detail' => 'required',
        ]);
        $post = new Post;
        $user = \Auth::user();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();
        return redirect()->route('questions.create', ['post_id' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->where('id', $id)->where('open_flag', true)->first();
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
        $post = DB::table('posts')->where('id', $id)->where('open_flag', true)->first();
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
        $post = DB::table('posts')->where('id', $id)->first();
        $question = DB::table('questions')->where('post_id', $id)->first();
        if (empty($question)) {
            return redirect()->route('questions.create', $id);
        }
        return view('posts.edit', ['post' => $post]);
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
        if (!$this->checkPostAuth($id)) {
            return redirect()->route('posts.index')->with('faild', 'データの編集に失敗しました');
        }

        $post = Post::find($id);

        if (isset($request->jump_img)) {
            if ($this->fileUpload($request)) {
                $filename = $request->jump_img->store('public/image/jump_images');
                $post->jump_img = basename($filename);
            } else {
                return redirect()->back()->withInput()->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
            }
        }
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->jump_url = $request->jump_url;
        $post->jump_text = $request->jump_text;
        $post->save();

        return redirect()->route('posts.index')->with('succeed', '編集が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    private function checkPostAuth($postId)
    {
        $user = \Auth::user();
        $post = DB::table('posts')->where('id', $postId)->where('user_id', $user->id)->first();
        return !empty($post);
    }

    private function fileUpload($request)
    {
        $this->validate($request, [
            'jump_img' => [
                'file',
                'dimensions:min_width=50,min_height=50,max_width=1200,max_height=1200',
            ]
        ]);
        return $request->file('jump_img')->isValid([]);
    }
}
