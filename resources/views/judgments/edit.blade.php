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
                            <?php $rangeList = ['結果が50~41ポイントのとき', '結果が40~31ポイントのとき', '結果が30~21ポイントのとき', '結果が20~11ポイントのとき', '結果が10~0ポイントのとき']; ?>
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
                                        <div class="form-group">
                                            @if ($judgment->{'range_img'.$order})
                                                <p>
                                                    <img src="{{ asset('storage/image/judgment/' . $judgment->{'range_img'.$order}) }}" alt="" class="img-fluid">
                                                </p>
                                            @endif
                                            {!! Form::label('range_img' . $order, '診断結果画像(420x300推奨)', ['class' => 'control-label']) !!}
                                            {!! Form::file('range_img' . $order, ['style' => 'display:none;']) !!}
                                            <div class="input-group">
                                                <input type="text" id="photoCover{{$order}}" class="form-control" placeholder="ファイルを選択してください">
                                                <span class="input-group-btn"><button type="button" class="btn btn-info" onclick="$('input[id=range_img{{$order}}]').click();">参照</button></span>
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
<script>
    $('input[id=range_img1]').change(function() {
        $('#photoCover1').val($(this).val());
    });
    $('input[id=range_img2]').change(function() {
        $('#photoCover2').val($(this).val());
    });
    $('input[id=range_img3]').change(function() {
        $('#photoCover3').val($(this).val());
    });
    $('input[id=range_img4]').change(function() {
        $('#photoCover4').val($(this).val());
    });
    $('input[id=range_img5]').change(function() {
        $('#photoCover5').val($(this).val());
    });
</script>
@endsection