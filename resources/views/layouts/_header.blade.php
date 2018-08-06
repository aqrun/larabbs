<div class="navbar-static-top">
    <div class="container">
        <div class="navbar navbar-light navbar-expand-md">
            <a class="navbar-brand" href="{{ url('/') }}">LaraBBS</a>
            <button class="navbar-toggler" type="button"
                    data-target="#app-navbar-collapse" aria-expaned="false" aria-label="Toggle navigation"
                    aria-controls="navbarSupportedContent"
                    data-toggle="collapse">
                <span class="nav-toggle-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    
                </ul>

                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">登录</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">注册</a>
                    </li>
                    @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                       aria-haspopup="true" id="navbarDropDown"
                       aria-expanded="false">
                        <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                            <img src="https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
                        </span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                               class="dropdown-item"
                            >退出登录</a>
                            <form id="logout-form" action="{{ route('logout')}}" method="post" style="display:none">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
