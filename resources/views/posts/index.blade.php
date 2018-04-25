@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="page-header">
            <h5 class="text-center">{{ $user->name }}の作成した診断一覧</h5>
        </div>
        @if (session('succeed'))
            <div class="alert alert-success">
                {{ session('succeed') }}
            </div>
        @elseif (session('faild'))
            <div class="alert alert-danger">
                {{ session('faild') }}
            </div>
        @endif
        <div class="row">
            @if (!$posts->isEmpty())
                @foreach ($posts as $post)
                    <div class="card col-md-4 col-sm-6 col-xs-12">
    					<div class="card-body text-center">
                            <h4 class="card-title"> <a href="{{ action('PostsController@show', $post->id) }}" target="_blank">{{ $post->title }}</a></h4>
                            <p class="card-text">{{ mb_strimwidth($post->detail, 0, 100, "...") }}</p>
                            <a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-primary">編集</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">削除</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">削除</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            「{{ $post->title }}」を削除します。よろしいですか？
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                            {!! Form::open(['route' => ['posts.destroy',$post->id],'method'=>'delete']) !!}
                                                <button type="submit" class="btn btn-danger">削除</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
    					</div>
    				</div>
                @endforeach
            @else
                <div class="card mt-4 mx-2" style="width: 100%;">
                    <div class="card-body text-center">
                        <p>データがありません。新しく診断を作成しましょう！</p>
                        <a href="{{ action('PostsController@create') }}" class="btn btn-primary">新規作成</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="mt-4 center-block text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection