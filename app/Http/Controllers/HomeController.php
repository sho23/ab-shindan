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
                ->orderBy('id', 'asc')
                ->where('open_flag', true)
                ->paginate(15);
        return view('home.index', ['posts' => $posts]);
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
