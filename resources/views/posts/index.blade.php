@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="page-header">
            <h3 class="text-center">{{ $user->name }}の作成した診断一覧</h3>
        </div>
        <div class="row">
            @if (!$posts->isEmpty())
                @foreach ($posts as $post)
                    <div class="card col-md-4 col-sm-6 col-xs-12">
    					<div class="card-body text-center">
    						<h4 class="card-title">{{ $post->title }}</h4>
    						<p class="card-text">{{ $post->detail }}</p>
    						<a href="{{ url('/posts', ['post_id' => $post->id]) }}" class="btn btn-primary">編集</a>
    					</div>
    				</div>
                @endforeach
            @else
                <div class="card mt-4 mx-2" style="width: 100%;">
                    <div class="card-body text-center">
                        <p>データがありません。新しく診断を作成しましょう！</p>
                        <a href="{{ action('PostsController@create') }}" class="btn btn-primary">新規作成</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection