@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">診断作成</h5>
                <h5 class="card-text">診断を作成しよう！</5>
            </div>
        </div>
        {!! Form::open(['route' => ['posts.store'], 'method' => 'post']) !!}
            <div class="row">
                <div class="card mb-2 mx-2" style="width: 100%;">
					<div class="card-body">
                        <div class="form-group">
                            <label for="title">診断のタイトル</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="例) ラーメン好き診断">
                        </div>
                        <div class="form-group">
                            <label for="detail">診断の説明</label>
                            {{Form::textarea('detail','', ['id' => 'detail', 'class' => 'form-control','placeholder' => '例) この診断はあなたがどれぐらいラーメン好きかを判定するよ。10個の設問に答えてあなたのラーメン好き度合いを診断しよう！'])}}
                        </div>
                        <div class="card-body text-center">
                            {!! Form::submit('次へ', ['class' => 'btn btn-primary']) !!}
                        </div>
					</div>
				</div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection