<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Connect</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">.
            <span class="navbar-toggler-icon"></span>
        </button>
         <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
                <ul class="nav navbar-nav navbar-right">
                    <!--ログイン状態で表示を変更-->
                    @if(Auth::check())
                        <!--仮で設置-->
                        <li class="nav-item">{!! link_to_route('users.show','mypost',['id' => Auth::id()],['class' => 'nav-link']) !!}</li>
                        <li class="nav-item">{!! link_to_route('users.mypage','mypage',['id' => Auth::id()],['class' => 'nav-link']) !!}</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right ">
                                <!--仮で設置-->
                                <li class="dropdown-item">{!! link_to_route('users.index','ユーザー一覧',[],['class' => 'nav-dark']) !!}</li>
                                <li class="dropdown-item">{!! link_to_route('users.followings','フォロー',['id' => Auth::id()],['class' => 'nav-dark']) !!}</li>
                                <li class="dropdown-item">{!! link_to_route('users.followers','フォロワー',['id' => Auth::id()],['class' => 'nav-dark']) !!}</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            </ul>
                        </li>
                    @else
                    <li class="nav-item">{!! link_to_route('signup.get', '新規会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login','ログイン',[],['class' => 'nav-link']) !!}</li>
                    @endif
                </ul>
        </div>
    </nav>
</header>