    <header class="header-area">
        <div class="container">
            <div class="menu-area">
                <div class="humbarger" id="humbarger">
                    <i class="icon-menu-button"></i>
                </div>
                <div class="main-menu">
                    <nav id='easy-menu'>
                        <div id="head-mobile">
                        </div>
                        <div class="button">
                            <i class="icon-menu-button"></i>
                        </div>
                        <ul>
                            <li><a href="/">首頁</a></li>
                            <li><a href="{{ route('index.file') }}">歸檔 </a></li>
                            <li><a href="{{ route('index.about') }}">關於我</a></li>
                            <li><a href="{{ route('index.friend') }}">友情链接</a></li>
                            <li><a href='https://github.com/ChinaLeng'>GitHub</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="login-register">
                @if(Auth::guard('social')->check())
                <span>您好</span>
                <span >❤️</span>
                <span><a href="#">{{Auth::guard('social')->user()->name}}</a></span>
                @else
                <span>登陸：</span>
                <span><a href="{{ route('login.weibo') }}">微博</a></span>
                <span >❤️</span>
                <span><a href="{{ route('login.github') }}">GitHub</a></span>
                @endif
            </div>
            <div class="logo">
                <a href="#">☽</a>
                <!-- <a href="#">☼</a> -->
            </div>
        </div>
    </header>