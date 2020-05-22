<div class="card">
    <div class="card-hedder">
        <h3 class="card-title">{{ $user->name }}</h3> 
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 30) }}" alt="">

    </div>
        
</div>

@include('user_follow.follow_button', ['user' => $user])