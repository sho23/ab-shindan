@extends('layouts.app')
@section('title', 'AB診断')
@section('content')
<div id="wrap">
    <div class="container">
        <div class="card mb-4 text-center" style="width: 100%;">
            <div class="card-body">
                <h3 class="card-title">{{ $judgment->{"range" . $range} }}</h5>
                <h5 class="card-text">{{ $judgment->{"range_text" . $range} }}</5>
            </div>
        </div>
        <div class="card mb-2 mx-2" style="width: 100%;">
            <div class="card-body text-center">
                <a href="" class="btn btn-primary">TOPへ</a>
            </div>
        </div>
    </div>
</div>
@endsection