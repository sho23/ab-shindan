<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'terms', 'privacy']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
                ->orderBy('id', 'desc')
                ->where('open_flag', true)
                ->where('pickup_flag', false)
                ->paginate(12);
        $picPosts = DB::table('posts')
                ->orderBy('id', 'desc')
                ->where('open_flag', true)
                ->where('pickup_flag', true)
                ->limit(3)
                ->get();

        return view('home.index', compact('posts', 'picPosts'));
    }

    public function terms()
    {
        return view('home.terms');
    }

    public function privacy()
    {
        return view('home.privacy');
    }
}
