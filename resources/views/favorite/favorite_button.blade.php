@if (Auth::user()->is_favoriting($picture->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $picture->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-block  w-auto"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $picture->id]]) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-light btn-block w-auto"]) !!}
    {!! Form::close() !!}
@endif
