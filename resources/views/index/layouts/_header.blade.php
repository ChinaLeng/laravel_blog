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
                <a href="#">{{ \App\Models\Article::get_day() }}</a>
                <!-- <a href="#"></a> -->
            </div>
        </div>
        <div class="hidden-sidebar">
            <div id="hidden-sidebar-close">
                <i class="icon-icomoon-close"></i>
            </div>
            <div class="sidebar">
                <aside class="widget author-widget text-center">
                    <div class="widget-title">
                        <a href="/" class="base-color">首頁</a>
                    </div>
                    <div class="widget-title">
                        <a href="{{ route('index.file') }}" class="base-color">歸檔</a>
                    </div>
                    <div class="widget-title">
                        <a href="{{ route('index.about') }}" class="base-color">關於我</a>
                    </div>
                    <div class="widget-title">
                        <a href="{{ route('index.friend') }}" class="base-color">友情链接</a>
                    </div>
                    <div class="widget-title">
                        <a href='https://github.com/ChinaLeng' class="base-color">GitHub</a>
                    </div>
                </aside>
            </div>
        </div>
    </header>