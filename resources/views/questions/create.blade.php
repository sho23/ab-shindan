@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">質問作成</h5>
                <h5 class="card-text">質問を作成しよう！
                    <br><br>・<strong>はい/いいえ</strong>で答えられる質問を作ろう
                    <br>・最後にいくつ「はい」があったかで5段階に結果を表示するよ！
                </h5>
            </div>
        </div>
        {!! Form::open(['route' => ['questions.store'], 'method' => 'post']) !!}
        {{Form::hidden('post_id', $post->id)}}
            <div class="row">
                @for ($i=1; $i <= 10; $i++)
                    <div class="card mb-2 mx-2" style="width: 100%;">
                        <div class="card-body">
                        <div class="form-group">
                            <label for="question{{ $i }}">設問{{ $i }}.</label>
                            <input type="text" class="form-control" id="question{{ $i }}" name="question{{ $i }}" placeholder="例) 行きつけのラーメン屋がある">
                        </div>
                        </div>
                    </div>
                @endfor
                <div class="card mb-2 mx-2" style="width: 100%;">
                    <div class="card-body text-center">
                        {!! Form::submit('完了する！', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection