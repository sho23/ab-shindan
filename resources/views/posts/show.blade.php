@extends('layouts.app')
@section('title', $post->title)
@section('detail', $post->detail)
@section('url', url("/posts/{$post->id}"))
@section('ogimg', 'image/image.php?pt=' . $post->title . '&kc=' . $post->key_color)
@section('content')
<div id="wrap">
    <div class="container">
        <div class="mb-4 text-center">
                <img src="{{asset('image/image.php?pt=' . $post->title . '&kc=' . $post->key_color)}}" alt="" class="img-fluid">
                <h5 class="card-text">{{ $post->detail }}</h5>
                <p class="card-text"><small class="text-muted">{{ $count }}人が診断　平均点{{ $avg }}/50</small></p>
        </div>
        {!! Form::open(['route' => ['scores.store'], 'method' => 'post']) !!}
        {{Form::hidden('post_id', $post->id)}}
            <div class="row">
                @foreach ($questions as $question)
                    <div class="card mb-2 mx-2" style="width: 100%;">
    					<div class="card-body text-center">
                            <h6 class="card-title">{{ $question->order }}.  {{ $question->title }}</h6>
                            <div class="text-center">
                                <label class="mr-4">{{ Form::radio('answer' . $question->order, 1, true)}}はい</label>
                                <label>{{ Form::radio('answer' . $question->order, false)}}いいえ</label>
                            </div>
    					</div>
    				</div>
                @endforeach
                <div class="card mb-2 mx-2" style="width: 100%;">
                    <div class="card-body text-center">
                        {!! Form::submit('結果を見る！', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection