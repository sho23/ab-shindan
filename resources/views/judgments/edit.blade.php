@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">診断結果編集</h5>
                <p class="card-text">診断結果の編集を行います</p>
            </div>
        </div>
        {!! Form::open(['route' => ['judgments.update', $judgment->id], 'method' => 'put', 'files' => true]) !!}
            <div class="row">
                <div class="card mb-2 mx-2" style="width: 100%;">
					<div class="card-body row">
                        <div class="col-md-3  mb-4">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ action('PostsController@edit', $judgment->post_id) }}" style="display:block;">診断の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('QuestionsController@edit', $judgment->post_id) }}" style="display:block;">質問の編集</a></li>
                                <li class="list-group-item"><a href="{{ action('JudgmentsController@edit', $judgment->post_id) }}" style="display:block;">診断結果の編集</a></li>
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
                            <div class="card mb-2 mx-2" style="width: 100%;">
                                <div class="card-body">
                                    <div class="form-group">
                                        <p>画像タイプ</p>
                                        <label class="mr-4">{{ Form::radio('img_type', 1, $judgment->img_type == 1)}}　<img src="{{ asset('/image/num50.png') }}" alt="" style="max-width:50px;"> ポイント</label>
                                        <label class="mr-4">{{ Form::radio('img_type', 2, $judgment->img_type == 2)}}　<img src="{{ asset('/image/star5.png') }}" alt="" style="max-width:50px;"> 星</label>
                                        <label class="mr-4">{{ Form::radio('img_type', 3, $judgment->img_type == 3)}}　<img src="{{ asset('/image/100per.jpg') }}" alt="" style="max-width:50px;"> パーセント</label>
                                        <label class="mr-4">{{ Form::radio('img_type', 0, $judgment->img_type == 0)}}　個別に指定する</label>
                                    </div>
                                </div>
                            </div>
                            <?php $rangeList = ['結果が50~41ポイントのとき', '結果が40~31ポイントのとき', '結果が30~21ポイントのとき', '結果が20~11ポイントのとき', '結果が10~1ポイントのとき', '結果が0ポイントのとき']; ?>
                            @foreach ($rangeList as $key => $range)
                                <?php $order = $key + 1; ?>
                                <div class="card mb-2 mx-2" style="width: 100%;">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="range{{$order}}">診断結果{{ $order }}　({{ $range }})</label>
                                            {{Form::text('range' . $order, $judgment->{'range'.$order}, ['id' => 'range' . $order, 'class' => 'form-control'])}}
                                        </div>
                                        <div class="form-group">
                                            <label for="range_text{{$order}}">結果説明{{ $order }}</label>
                                            {{Form::text('range_text' . $order, $judgment->{'range_text'.$order}, ['id' => 'range_text' . $order, 'class' => 'form-control'])}}
                                        </div>
                                        <div class="form-group result-img f-upload">
                                            <small>診断結果画像(420x300推奨)</small>
                                            @if ($judgment->{'range_img'.$order})
                                                <p class="my-4 curImg">
                                                    <img src="{{ asset('storage/image/judgment/' . $judgment->{'range_img'.$order}) }}" alt="" class="img-fluid" width="420px" heght="300px;">
                                                </p>
                                            @endif
                                            <div class="imagePreview"></div>
                                            <div class="input-group mt-2">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-info">
                                                        Choose File{!! Form::file('range_img' . $order, ['style' => 'display:none;', 'class' => 'img-fluid']) !!}
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control text-info" readonly="">
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