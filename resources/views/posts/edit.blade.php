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
        {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'files' => true]) !!}
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
                            <div class="form-group">
                                <p>テーマカラー</p>
                                <label class="mr-4">{{ Form::radio('key_color', 'blue', $post->key_color == 'blue')}}　<img src="{{ asset('/image/bg-blue.png') }}" alt="" style="max-width:50px;"></label>
                                <label class="mr-4">{{ Form::radio('key_color', 'yellow', $post->key_color == 'yellow')}}　<img src="{{ asset('/image/bg-yellow.png') }}" alt="" style="max-width:50px;"></label>
                                <label class="mr-4">{{ Form::radio('key_color', 'green', $post->key_color == 'green')}}　<img src="{{ asset('/image/bg-green.png') }}" alt="" style="max-width:50px;"></label>
                            </div>
                            <div class="form-group">
                                <label for="jump_url">バナーのURL</label>
                                {{Form::text('jump_url',$post->jump_url, ['id' => 'jump_url', 'class' => 'form-control',  'placeholder' => "例) http://google.com/"])}}
                            </div>
                            <div class="form-group">
                                <label for="jump_text">バナーのテキスト</label>
                                {{Form::text('jump_text',$post->jump_text, ['id' => 'jump_text', 'class' => 'form-control',  'placeholder' => "例) 絶賛キャンペーン中！！"])}}
                            </div>
                            <div class="form-group">
                                @if ($post->jump_img)
                                    <p>
                                        <img src="{{ asset('storage/image/jump_images/' . $post->jump_img) }}" alt="" class="img-fluid">
                                    </p>
                                @endif
                                {!! Form::label('jump_img', 'バナー画像(600x100推奨)', ['class' => 'control-label']) !!}
                                {!! Form::file('jump_img') !!}
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