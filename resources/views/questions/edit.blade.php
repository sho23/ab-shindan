@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">質問編集</h5>
                <h5 class="card-text">質問の編集を行います</5>
            </div>
        </div>
        {!! Form::open(['route' => ['questions.update', $postId], 'method' => 'put']) !!}
            <div class="row">
                <div class="card mb-2 mx-2" style="width: 100%;">
					<div class="card-body row">
                        <div class="col-md-3">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ action('PostsController@edit', $postId) }}" style="display:block;">診断の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('QuestionsController@edit', $postId) }}" style="display:block;">質問の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('PostsController@edit', $postId) }}" style="display:block;">診断結果の編集</a></li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            @if (session('succeed'))
                                <div class="alert alert-success">
                                    {{ session('succeed') }}
                                </div>
                            @endif
                            @foreach ($questions as $quesiton)
                                <div class="card mb-2 mx-2" style="width: 100%;">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="question{{ $quesiton->order }}">設問{{ $quesiton->order }}.</label>
                                            {{Form::text('question' . $quesiton->id, $quesiton->title, ['id' => 'question' . $quesiton->order, 'class' => 'form-control'])}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="card mb-2 mx-2" style="width: 100%;">
                                <div class="card-body text-center">
                                    {!! Form::submit('変更する', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection