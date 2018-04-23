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
                <h3 class="card-title">{{ $judgment->{"range" . $range} }}</h3>
                <p class="card-text">{{ $judgment->{"range_text" . $range} }}</p>
                @if ($judgment->{'range_img'.$range})
                    <img src="{{ asset('storage/image/judgment/' . $judgment->{'range_img' . $range}) }}" alt="" class="img-fluid mt-4">
                @endif
            </div>
            <div class="row mx-auto mb-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url('/posts/' . $post->id); ?>" class="btn btn-default mr-4" style="background:#4867ad;">facebookでシェア</a>
                <a href="http://twitter.com/share?url=<?php echo url('/posts/' . $post->id); ?>&text={{ $post->title }}&hashtags=AB診断メーカー, {{ $post->title }}" class="btn btn-default mr-4" style="background:#5babea;">twitterでシェア</a>
            </div>
        </div>
        @if (isset($post->jump_url))
            <div class="row text-center mb-4">
               <img src="{{ asset('/image/arrow.jpeg') }}" class="mx-auto" alt="" width="50px;" height="50px;">
            </div>
            <div class="card mb-2 mx-2" style="width: 100%;">
                <div class="card-body text-center">
                <h6 class="card-title">{{ $post->jump_text }}</h6>
                    <a href="{{ $post->jump_url }}" target="_blank"> <img src="{{ asset('storage/image/jump_images/' . $post->jump_img) }}" alt="" class="img-fluid"></a>
                </div>
            </div>
        @else
        <div class="card mb-2 mx-2" style="width: 100%;">
            <div class="card-body text-center">
                <a href="{{ action('HomeController@index') }}" class="btn btn-primary">診断一覧へ</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection