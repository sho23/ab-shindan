@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="page-header">
            <p class="text-left"></p>
            <h3 class="text-center">AB診断の一覧！</h3>
        </div>
        <div class="row astrolist">
            @foreach ($posts as $post)
                <div class="card col-md-4 col-sm-6 col-xs-12">
					<div class="card-body text-center">
						<h4 class="card-title">{{ $post->title }}</h4>
						<p class="card-text">{{ $post->detail }}</p>
						<a href="{{ url('/posts', ['post_id' => $post->id]) }}" class="btn btn-primary">この診断で遊ぶ！</a>
					</div>
				</div>
            @endforeach
        </div>
    </div>
</div>
@endsection