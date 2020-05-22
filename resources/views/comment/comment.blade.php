@if (Auth::id() == $user->id)
    {!! Form::open(['route' => 'comments.store']) !!}
        <div class="form-group">
            <label for="comment">コメント</label>
            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '1']) !!}
            {{ Form::hidden('picture_id',$picture->id) }}
            
            {!! Form::submit('投稿', ['class' => 'btn btn-dark btn-block']) !!}
        </div>
    {!! Form::close() !!}
@endif