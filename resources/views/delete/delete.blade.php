@extends('layouts.app')

@section('content')
<div class="center jumbotron">
        <div class="text-center">
            <h1>退会手続き</h1><br>
            <h3>退会される方は、退会ボタンをクリックしてください</h3><br>
            <t>※退会ボタンをクリックした時点で、現在保存されているデータはすべて削除されます。</t><br><br>
            {!! link_to_route('user.delete', '退会する',[],['class' => 'btn btn-lg btn-dark rounded-pill ']) !!}
            {!! link_to_route('mypage', '考え直す',[],['class' => 'btn btn-lg btn-dark rounded-pill  ']) !!}
        </div>
    </div>
    
@endsection