@extends('layouts.app')
@section('title', 'AB診断メーカー')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="mb-4">
            <h4 class="text-center">みんなが作った診断</h4>
        </div>
        <div class="row">
            @foreach ($picPosts as $picPost)
                <div class="card col-md-4 col-sm-6 col-xs-12">
                    <div class="card-body text-center">
                        <a href="{{ url('/posts', ['post_id' => $picPost->id]) }}"><img src="{{asset('image/image.php?pt=' . $picPost->title . '&kc=' . $picPost->key_color)}}" alt="" class="img-fluid mb-2"><span class="badge badge-danger badge-pr">　PR　</span></a>
                        <p class="card-text">{{ mb_strimwidth($picPost->detail, 0, 100, "...") }}</p>
                        <a href="{{ url('/posts', ['post_id' => $picPost->id]) }}" class="btn btn-primary">この診断で遊ぶ！</a>
                    </div>
                </div>
            @endforeach
            @foreach ($posts as $post)
                <div class="card col-md-4 col-sm-6 col-xs-12">
					<div class="card-body text-center">
                        <a href="{{ url('/posts', ['post_id' => $post->id]) }}"><img src="{{asset('image/image.php?pt=' . $post->title . '&kc=' . $post->key_color)}}" alt="" class="img-fluid mb-2"></a>
						<p class="card-text">{{ mb_strimwidth($post->detail, 0, 100, "...") }}</p>
						<a href="{{ url('/posts', ['post_id' => $post->id]) }}" class="btn btn-primary">この診断で遊ぶ！</a>
					</div>
				</div>
            @endforeach
        </div>
    </div>
    <div class="mt-4 center-block text-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection