@extends('layouts.app')

@section('content')

    <h1>詳細ページ</h1>

    <div>
        <h5>id {{ $picture->id }}</h5>
    
        <h3>投稿イラスト</h3>
        <p>{{ $picture->picture_name }}</p>
        <div>
            @if(Auth::id() == $picture->user_id)
                {!! Form::open(['route' =>['pictures.destroy',$picture->id],'method' => 'delete']) !!}
                    {!! Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
        <div>
            @include('favorite.favorite_button', ['picture' => $picture])
        </div>
    </div>
    
    <!--仮　直す-->
    <h3>コメント一覧</h3>
    @forelse($picture->comment as $comment)
    
        <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">    
        {!! nl2br(e($comment->comment)) !!}
            
    @empty

        <p>コメントはまだありません</p>

    @endforelse

    @include('comment.comment',['user' => $user])
    
@endsection