@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">質問編集</h5>
                <p class="card-text">質問の編集を行います</p>
            </div>
        </div>
        {!! Form::open(['route' => ['questions.update', $postId], 'method' => 'put']) !!}
            <div class="row">
                <div class="card mb-2 mx-2" style="width: 100%;">
					<div class="card-body row">
                        <div class="col-md-3 mb-4">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ action('PostsController@edit', $postId) }}" style="display:block;">診断の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('QuestionsController@edit', $postId) }}" style="display:block;">質問の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('JudgmentsController@edit', $postId) }}" style="display:block;">診断結果の編集</a></li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                           @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('succeed'))
                                <div class="alert alert-success">
                                    {{ session('succeed') }}
                                </div>
                            @endif
                            <div class="card mb-2 mx-2" style="width: 100%; display:none;">
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="number">問題数</label>
                                                <select class="form-control" id="number" name="number">
                                                    <option value="1" {{ count($questions) <= 5 ? 'selected' : '' }}>5問</option>
                                                    <option value="2" {{ count($questions) > 5 ? 'selected' : '' }}>10問</option>
                                                </select>
                                        </div>
                                </div>
                            </div>
                            @foreach ($questions as $key => $quesiton)
                                <div class="card mb-2 mx-2 <?php  if ($key > 4) { echo 'extr';}?>" style="width: 100%;">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="question{{ $quesiton->order }}">設問{{ $quesiton->order }}.</label>
                                            {{Form::text('question' . $quesiton->id, $quesiton->title, ['id' => 'question' . $quesiton->order, 'class' => 'form-control'])}}
                                        </div>
                                        <div class="form-group">
                                            <small>設問{{ $quesiton->order }}.のポイント</small>
                                            <div>
                                                <label class="mr-4">{{ Form::radio('invert_flag' . $quesiton->id, 0, !$quesiton->invert_flag)}}「はい」に<span class="variable-point">10</span>ポイント</label>
                                                <label class="mr-4">{{ Form::radio('invert_flag' . $quesiton->id, 1, $quesiton->invert_flag)}}「いいえ」に<span class="variable-point">10</span>ポイント</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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