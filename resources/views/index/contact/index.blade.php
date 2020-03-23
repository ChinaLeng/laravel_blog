@extends('index.layouts.app')
@section('purpose',config('kuan.introduce'))
@section('content')
<div class="container white-bg pr">
    <div class="row">
        <div class="col-md-8">
            <div class="easy-contact-box">
                <div class="">
                    <div class="heading">
                        <h3>留言</h3>
                    </div>
                    @foreach(['success', 'warning', 'info', 'danger'] as $msg)
                        @if(session()->has($msg))
                            <div class="alert alert-success" style="color: #222;background-color: rgba(0,0,0,.02);border-color: rgba(0,0,0,.02);">
                                 {{ session()->get($msg) }}
                            </div>
                        @endif
                    @endforeach
                    <div class="leave-comment-box" id="hui">
                        <form action="{{ route('index.message') }}" method="post">
                            {{ csrf_field() }}
                            <div class="name-email-website-field">
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ cache('name') }}" required placeholder="姓名" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ cache('email') }}" placeholder="郵箱,可不写" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="url" name="url" placeholder="你的網站鏈接,可不写" class="form-control" />
                                </div>
                            </div>
                            <input type="hidden" name="pid" id='pid' value="0">
                            <div class="form-group">
                                <textarea class="form-control" id="content" required name="content" placeholder="内容" rows="8" cols="80"></textarea>
                            </div>
                            <input type="submit" class="easy-button-two active" value="提交"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="sidebar mt70">
                <aside class="widget recent-post-widget">
                    <div class="widget-title">
                        <h3 class="base-color">介紹</h3>
                    </div>
                    <div>
                    	<div style="    font-weight: 600;">
                    		陳政寬<br> 一位PHP開發者<br>总想着记录生活中的东西,无奈文笔有限<br>
                            总想着分享一些东西,奈何学疏才浅<br>总想着唱歌,无奈五音不全<br>但是总要记录一些生活中或者身边遇到的人和事,因为人的记忆力是有限的<br>
                    	</div>
                    </div>
                </aside><!--/.recent-post-widget-->
            </div>
        </div>


        <div class="col-md-12" style="box-shadow: 0 0 10px rgba(171, 171, 171, 0);">
            <div class="blog-detail pdb80 white-bg" style="padding-top: 0;">
                <div class="inner" style="max-width: 100%;">
                	<div class="blog-post-comment-box" style="margin-top: 0;">
                        <div class="heading"><h3>共<span class="base-color">{{ count($message) }}</span>条留言</h3></div>
                        <div class="all-comments">
                            @foreach($message as $k => $v)
                            <div class="single-comment" id="{{ $v['id'] }}_{{ $v['name'] }}">
                                <div class="vertical-image-text">
                                    <div class="image">
                                        <img src="/index/author1.jpg" alt="author1.jpg" class="img-circle">
                                    </div>
                                    <div class="text">
                                        <div class="name-date"><h5>{{ $v['name'] }}</h5><span>{{ $v['created_at'] }}</span></div>
                                        @if($v['status'] == 1)
                                        <p>{!! $v['content'] !!}</p>
                                        @else
                                        <p style="background: #DCDCDC;">评论已被屏蔽</p>
                                        @endif
                                    </div>
                                    <div class="replay">
                                        <a href="#hui" pid="{{ $v['id'] }}" name="{{ $v['name'] }}" class="easy-button button-small">回复</a>
                                    </div>
                                </div>
                                @foreach($v['child'] as $x => $y)
                                <div class="replay-comment single-comment" id="{{ $y['id'] }}_{{ $y['name'] }}">
                                    <div class="vertical-image-text">
                                        <div class="image">
                                            <img src="/index/author1.jpg" alt="author1.jpg" class="img-circle">
                                        </div>
                                        <div class="text">
                                            <div class="name-date"><h5>{{ $y['name'] }}<span style="font-size: 12px;color: #828282;padding: 0 6px;">回复</span>{{ $y['reply_name'] }}</h5><span>{{ $y['created_at'] }}</span></div>
                                            @if($y['status'] == 1)
                                            <p>{!! $y['content'] !!}</p>
                                            @else
                                            <p style="background: #DCDCDC;">评论已被屏蔽</p>
                                            @endif
                                        </div>
                                        <div class="replay">
                                            <a href="#hui" pid="{{ $y['id'] }}" name="{{ $y['name'] }}" class="easy-button button-small">回复</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        //回复评论
        $('.single-comment').on('click','.button-small',function(){
            var obj=$(this);
            var pid= $(obj).attr('pid'),
                name= $(obj).attr('name');
            $('#content').attr('placeholder','@'+name);
            $('#pid').val(pid);
        });
    })
</script>
@endsection