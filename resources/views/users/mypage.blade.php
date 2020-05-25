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
        <!--詳細一覧の作成-->
        <div class="col-sm-8">
            <table class="table table-bordered">
                <tr>
                    <th>ユーザー名</th>
                        <td>{{$user->name }}</td>
                    </tr>
                <tr>
                    <th>投稿数</th>
                    <td>{{$count_pictures}}</td>
                </tr>
                <tr>
                    <th>フォロー数</th>
                    <td>{{$count_followings}}</td>
                </tr>
                <tr>
                    <th>フォロワー数</th>
                    <td>{{$count_followers}}</td>
                </tr>
            </table>
       　<!--退会ボタンをつける-->
       　{!!  link_to_route('quit', '退会')  !!}

        </div>
    </div>
@endsection