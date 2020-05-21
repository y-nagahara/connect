@extends('layouts.app')

@section('content')

    <h1>詳細ページ</h1>

    <div>
    <h5>id {{ $picture->id }}</h5>
    
    <h3>投稿イラスト</h3>
    <p>{{ $picture->picture_name }}</p>
    </div>
    <!--仮　直す-->

    @include('comment.comment',['user' => $user])
    
@endsection