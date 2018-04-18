@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">診断編集</h5>
                <h5 class="card-text">診断の編集を行います</5>
            </div>
        </div>
        {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
            <div class="row">
                <div class="card mb-2 mx-2" style="width: 100%;">
					<div class="card-body row">
                        <div class="col-md-3 mb-4">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ action('PostsController@edit', $post->id) }}" style="display:block;">診断の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('QuestionsController@edit', $post->id) }}" style="display:block;">質問の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('JudgmentsController@edit', $post->id) }}" style="display:block;">診断結果の編集</a></li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="title">診断のタイトル</label>
                                {{Form::text('title',$post->title, ['id' => 'title', 'class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                <label for="detail">診断の説明</label>
                                {{Form::textarea('detail',$post->detail, ['id' => 'detail', 'class' => 'form-control'])}}
                            </div>
                            <div class="card-body text-center">
                                {!! Form::submit('変更', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
					</div>
				</div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection