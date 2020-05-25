@extends('layouts.app')

@section('content')
<div class="center jumbotron">
        <div class="text-center">
            <h1>退会手続き</h1><br>
            <h3>退会される方は、退会ボタンをクリックしてください</h3><br>
            <t>※退会ボタンをクリックした時点で、現在保存されているデータはすべて削除されます。</t><br><br>
           
            @if(Auth::id() == $user->id)
                {!! Form::open(['route' =>['quit.delete',$user->id],'method' => 'post']) !!}
                    {!! Form::submit('退会する',['class' => 'btn btn-danger w-auto rounded-pill']) !!}
                {!! Form::close() !!}
            @endif            
            {!! link_to_route('users.mypage', '考え直す',['id' => Auth::id()],['class' => 'btn btn-lg btn-dark w-auto  rounded-pill']) !!}
        </div>
    </div>
    
@endsection