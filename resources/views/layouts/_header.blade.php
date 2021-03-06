<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand " href="{{ url('/') }}">
            LaraBBS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @foreach(main_menu() as $v)
                    <li class="nav-item{{ config('mainMenu')==$v['id']?' active':'' }}">
                        <a class="nav-link" href="{{ $v['href'] }}">{{ $v['name'] }}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('topics.create') }}"
                           title="Add topic"
                           class="nav-link mt-1 mr-3 font-weight-bold">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                <li class="nav-item notification-badge">
                  <a class="nav-link mr-3 badge badge-pill badge-{{ Auth::user()->notification_count>0?'hint':'secondary' }} text-white" href="{{ route('notifications.index') }}">
                    {{ Auth::user()->notification_count }}
                  </a>
                </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        ><img src="{{ Auth::user()->avatar }}"
                            class="img-responsive img-circle" width="30px" height="30px"
                            />{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @can('manage_contents')
                            <a class="dropdown-item" href="{{ url(config('administrator.uri')) }}">
                              <i class="fas fa-tachometer-alt mr-2"></i>
                              管理后台
                            </a>
                            @endcan
                            <a href="{{ route('users.show', Auth::id()) }}" class="dropdown-item">
                                <i class="far fa-user mr-2"></i>
                                个人中心</a>
                            <a href="{{ route('users.edit', Auth::id()) }}" class="dropdown-item">
                                <i class="far fa-edit mr-2"></i>
                                编辑资料</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" id="logout">
                                <form action="{{ route('logout') }}"
                                      onsubmit="return confirm('您确定要退出吗？');"
                                      method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                                </form>
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
