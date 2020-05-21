<!--userが0人より多いとき-->
@if (count($users) > 0)
    <ul class="list-unstyled">
        <!--$usersから$userに1つずつ入れていく-->
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id],['users'=>'users']) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <!--userを10件ずつ表示（Controllerにも記載）-->
    {{ $users->links('pagination::bootstrap-4') }}
@endif