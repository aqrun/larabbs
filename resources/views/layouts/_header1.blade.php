<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">LaraBBS</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li>
                    <a href="{{ route('login') }}">登录</a>
                    <a href="{{ route('register') }}">注册</a>
                </li>
                @else
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                            <img src="https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
                        </span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="'menu'">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                            >退出登录</a>
                            <form id="logout-form" action="{{ route('logout')}}" method="post" style="display:none">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>