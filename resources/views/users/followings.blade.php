@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                    @include('user_follow.follow_button', ['user' => $user])
                </div>
            </div>
           <!--ユーザの投稿を入れたい-->
        <br><br>
        @if (count($pictures) > 0)
            @include('pictures.pictures', ['pictures' => $pictures])
        @endif 
        </aside>
        <div class="col-sm-8">
            @include('navtabs.navtabs', ['user' => $user])
            @include('users.users', ['users' => $users])
   
        </div>
    </div>
@endsection