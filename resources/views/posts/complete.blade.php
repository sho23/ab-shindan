@extends('layouts.app')
@section('title', $post->title)
@section('detail', $post->detail)
@section('url', url("/posts/{$post->id}"))
@section('ogimg', 'image/image.php?pt=' . $post->title . '&kc=' . $post->key_color)
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <img src="{{asset('image/image.php?pt=' . $post->title . '&kc=' . $post->key_color)}}" alt="" class="img-fluid">
                <p class="mt-4">診断作成完了！！診断結果のコメントや画像は「マイページ」→「編集」から編集できるよ！</p>
            </div>
            <div class="row mx-auto mb-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url('/posts/' . $post->id); ?>" class="btn btn-default mx-2" style="background:#4867ad;">facebookでシェア</a>
                <a href="http://twitter.com/share?url=<?php echo url('/posts/' . $post->id); ?>&text={{ $post->title }}&hashtags=AB診断メーカー, {{ $post->title }}" class="btn btn-default mx-2" style="background:#5babea;">twitterでシェア</a>
            </div>
            <div class="row mx-auto mb-4">
                <a href="{{ action('PostsController@index') }}" class="btn btn-primary">マイページへ</a>
            </div>
        </div>
    </div>
</div>
@endsection