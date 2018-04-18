@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">{{ $judgment->{"range" . $range} }}</h3>
                <h5 class="card-text">{{ $judgment->{"range_text" . $range} }}</h5>
                <img src="https://placehold.jp/3d4070/ffffff/600x300.png" alt="" class="img-fluid mt-4">
            </div>
        </div>
        @if (isset($post->jump_url))
            <div class="card mb-2 mx-2" style="width: 100%;">
                <div class="card-body text-center">
                <h3 class="card-title">{{ $post->jump_text }}</h3>
                    <a href="{{ $post->jump_url }}" target="_blank"> <img src="https://placehold.jp/d1d143/ffffff/600x100.png?text=Go%20to%20other%20page" alt="" class="img-fluid"></a>
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