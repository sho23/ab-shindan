@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h5>
                <h5 class="card-text">{{ $post->detail }}</5>
                <p class="card-text"><small class="text-muted">{{ $count }}人が診断　平均点{{ $avg }}</small></p>
            </div>
        </div>
        {!! Form::open(['route' => ['scores.store'], 'method' => 'post']) !!}
        {{Form::hidden('post_id', $post->id)}}
            <div class="row">
                @foreach ($questions as $question)
                    <div class="card mb-2 mx-2" style="width: 100%;">
    					<div class="card-body text-center">
    						<h4 class="card-title">{{ $question->order }}.  {{ $question->title }}</h4>
                            <div class="text-center">
                                <label class="mr-4">{{ Form::radio('answer' . $question->order, true)}}はい</label>
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