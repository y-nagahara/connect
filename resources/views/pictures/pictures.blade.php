<ul class="list-unstyled">
    @foreach ($pictures as $picture)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($picture->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $picture->user->name, ['id' => $picture->user->id]) !!} <span class="text-muted">posted at {{ $picture->created_at }}</span>
                </div>
                <div>
                    {!! link_to_route('pictures.deteils', $picture->picture_name, ['id' => $picture->id]) !!}
                </div>

                <div>
                    @if(Auth::id() == $picture->user_id)
                        {!! Form::open(['route' =>['pictures.destroy',$picture->id],'method' => 'delete']) !!}
                            {!! Form::submit('Delete',['class' => 'btn btn-danger w-auto form-inline' ]) !!}
                        {!! Form::close() !!}
                    @endif
                
                    @include('favorite.favorite_button', ['picture' => $picture])
                </div>

            </div>
        </li>
    @endforeach
</ul>
{{ $pictures->links('pagination::bootstrap-4') }}