@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">{{ $judgment->{"range" . $range} }}</h5>
                <h5 class="card-text">{{ $judgment->{"range_text" . $range} }}</5>
            </div>
        </div>
        @if (isset($post->jump_url))
            <div class="card mb-2 mx-2" style="width: 100%;">
                <div class="card-body text-center">
                    <a href="{{ $post->jump_url }}" class="btn btn-primary" target="_blank">{{ $post->jump_text }}</a>
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