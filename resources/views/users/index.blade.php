@extends('layouts.app')

@section('content')
    <!--users.bladeを読み込んで　usersに$usersを代入する-->
    @include('users.users', ['users' => $users])
@endsection