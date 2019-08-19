<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="has_sub">
                    <a href="javascript:void(0)" class="waves-effect "><i class="ti-home"></i> <span> 控制台 </span> </a>
                    <ul class="list-unstyled">
                        <li class=""><a href="/admins">仪表盘</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0)" class="waves-effect"><i class="ti-paint-bucket"></i> <span> 管理 </span> </a>
                    <ul class="list-unstyled">
                        <li class=""><a href="{{ route('admins.article.index') }}">文章</a></li>
                        <li class=""><a href="{{ route('admins.tag.index') }}">标签</a></li>
                        <li class=""><a href="{{ route('admins.comment.index') }}">评论</a></li>
                        <li class=""><a href="{{ route('admins.message.index') }}">留言</a></li>
                        <li class=""><a href="{{ route('admins.friend.index') }}">友链</a></li>
                        <li class=""><a href="{{ route('admins.user.index') }}">用户</a></li>
                    </ul>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>