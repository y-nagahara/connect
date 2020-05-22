@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card',['user' => $user])
            <br>
            <br>
            
            <div>
            @if (count($pictures) > 0)
                @include('pictures.pictures', ['pictures' => $pictures])
            @endif    
            </div>
            </aside>
        <!--タブの作成-->
        <div class="col-sm-8">
            @include('navtabs.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'pictures.store']) !!}
                    <div class="form-group">
                        <label for="name">Picture name</label>
                        {!! Form::textarea('picture_name', old('picture_name'), ['class' => 'form-control', 'rows' => '1']) !!}
                        <label for="url">Picture URL</label>
                        {!! Form::textarea('picture_url', old('picture_url'), ['class' => 'form-control', 'rows' => '1']) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-dark btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection
            
            <!--<ul class="nav nav-tabs nav-justified mb-3">-->
            <!--    <li class="nav-item"><a href="#" class="nav-link">フォロー</a></li>-->
            <!--    <li class="nav-item"><a href="#" class="nav-link">フォロワー</a></li>-->
            <!--    <li class="nav-item"><a href="#" class="nav-link">お気に入り</a></li>-->
            <!--   <li class="nav-item"><a href="#" class="nav-link">コメント</a></li>-->
            <!--</ul>-->
       