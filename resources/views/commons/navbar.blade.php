<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #ff9872;"> 
        <a class="navbar-brand font-weight-bold" href="/">WITH</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item"><a class="btn" href="{!! route('users.approvings', ['id'=>Auth::user()->id], ['class'=>'nav-link']) !!}"><span class="fas fa-heart"></span></a></li>
                    <li class="nav-item"><a class="btn" href="{!! route('users.commentings', ['id'=>Auth::user()->id], ['class'=>'nav-link']) !!}"><span class="fas fa-comment"></span></a></li>
                    <li class="nav-item font-weight-bold">{!! link_to_route('posts.create', '新規投稿', [], ['class'=>'nav-link']) !!}</li>
                    <li class="nav-item dropdown font-weight-bold">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{{ link_to_route('users.show', 'プロフィール', ['id'=>Auth::user()->id]) }}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{{ link_to_route('logout.get', 'ログアウト') }}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>