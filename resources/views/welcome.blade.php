@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <div class="col-sm-6">
                @if (count($pictures) > 0)
                    @include('pictures.pictures', ['pictures' => $pictures])
                @endif
            </div>
            <div class="col-sm-6">
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
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>connectへようこそ</h1><br>
            <t>connectはイラスト交流サービスです。</t><br>
            <t>会員登録をしてご利用ください。</t><br><br>
            {!! link_to_route('signup.get', '新規会員登録はこちら',[],['class' => 'btn btn-lg btn-dark rounded-pill ']) !!}
            {!! link_to_route('login', 'ログイン',[],['class' => 'btn btn-lg btn-dark rounded-pill  ']) !!}
        </div>
    </div>
    @endif
@endsection