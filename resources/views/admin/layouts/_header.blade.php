<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="" class="logo"><i class="icon-magnet icon-c-logo"></i><span>个人博客-后台管理</span></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="ion-navicon"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                     <input type="text" placeholder="Search..." class="form-control">
                     <a href=""><i class="fa fa-search"></i></a>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a href="" class="waves-effect waves-light">{{ Auth::guard('social')->user()->name }}</a>
                    </li>

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ Auth::guard('social')->user()->avatar }}" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <li><a href=""><i class="ti-user m-r-5"></i> 我的资料</a></li>
                            <li><a href=""><i class="ti-settings m-r-5"></i> 修改密码</a></li>
                            <li><a href=""><i class="ti-power-off m-r-5"></i> 退出登录</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>