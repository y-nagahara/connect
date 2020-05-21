<div class="card">
    
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3> 
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 50) }}" alt="">
    </div>
</div>
@include('user_follow.follow_button', ['user' => $user])