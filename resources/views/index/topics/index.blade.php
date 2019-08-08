@extends('index.layouts.app')
@section('title',$article->title)
@section('description',$article->title)
@section('keywords',$article->keywords)
@section('purpose',$article->title)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-detail pdb80 white-bg">
                <div class="inner">
                    <div class="heading">
                        <!-- <h2>Feel the beauty inside you</h2> -->
                        <div class="meta-info">
                            <span>作者<a href="#">{{ $article->user->name }}</a></span>
                            <span>发布于</span>
                            <span>{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="blog-detail-text">
                        {!! $article->content !!}
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="social-sharing-icon">
                                    <span class="share-icon"><a href="#"><i class="fa fa-share-alt"></i></a></span>
                                    <span class="share-icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
                                    <span class="share-icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
                                    <span class="share-icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="tag-list-container">
                                    <span>Tags:  </span>
                                    <div class="tag-list">
                                        @foreach($article->getTag($article->articletag->tag_id) as $k => $v)
                                        <a href="{{ $v->id }}" class="base-color">{{ $v->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                     <div class="author-information">
                        <div class="vertical-image-text">
                            <div class="image">
                                <img src="images/author1.jpg" class="img-responsive img-circle"  alt="author">
                            </div>
                            <div class="text">
                                <h4><a href="#">Megan Peu</a></h4>
                                <p>On the other hand, we denounce with righteous indignation and dislike men who charms of pleasure of the momen</p>
                                <div class="social-sharing-icon color-full-social">
                                    <span class="share-icon"><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></span>
                                    <span class="share-icon"><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></span>
                                    <span class="share-icon"><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="blog-post-comment-box">
                        <div class="heading"><h3><span class="base-color">{{ count($comment) }}</span>条评论</h3></div>
                        <div class="all-comments">
                            @foreach($comment as $k => $v)
                            <div class="single-comment">
                                <div class="vertical-image-text">
                                    <div class="image">
                                        <img src="{{ $v['avatar'] }}" alt="author1.jpg" class="img-circle">
                                    </div>
                                    <div class="text">
                                        <div class="name-date"><h5>{{ $v['name'] }}</h5><span>{{ $v['created_at'] }}</span></div>
                                        <p>{!! $v['content'] !!}</p>
                                    </div>
                                    <div class="replay">
                                        <a href="#comment-box" id="{{ $v['id'] }}" name="{{ $v['name'] }}" class="easy-button button-small">回复</a>
                                    </div>
                                </div>
                                @foreach($v['child'] as $x => $y)
                                <div class="replay-comment single-comment">
                                    <div class="vertical-image-text">
                                        <div class="image">
                                            <img src="{{ $y['avatar'] }}" alt="author1.jpg" class="img-circle">
                                        </div>
                                        <div class="text">
                                            <div class="name-date"><h5>{{ $y['name'] }}<span style="font-size: 12px;color: #828282;padding: 0 6px;">回复</span>{{ $y['reply_name'] }}</h5><span>{{ $y['created_at'] }}</span></div>
                                            <p>{!! $y['content'] !!}</p>
                                        </div>
                                        <div class="replay">
                                            <a href="#comment-box" id="{{ $y['id'] }}" name="{{ $y['name'] }}" class="easy-button button-small">回复</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @if($article->is_reply == 1)
                        <div class="blog-post-leave-comment">
                            <div class="heading">
                                <h3>提交评论</h3>
                            </div>
                            <div class="leave-comment-box" id="comment-box">
                                    <div class="name-email-website-field">
                                        <div class="form-group">
                                            <input type="email" id="email" placeholder="邮箱,可不填写" style="width: 40%;" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="content" placeholder="评论内容" rows="8" cols="80"></textarea>
                                    </div>
                                    <input type="submit" class="easy-button-two active" value="提交" aid="{{ $article->id }}" pid='0'/>
                            </div>
                        </div>
                        @endif
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
        //发表评论
        $('.blog-post-leave-comment').on('click', '.active', function () {
            var obj=$(this);
            $.get("{{ route('index.checklogin') }}", function(data) {
                if(data.status === 0){
                    var content = $('#content').val();
                    var aid     = $(obj).attr('aid'),
                        pid     = $(obj).attr('pid'),
                        email   = $('#email').val(),
                        postData={
                            "article_id":aid,
                            "pid":pid,
                            'content':content,
                            'email':email,
                            '_token':'{{csrf_token()}}'
                        };
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('index.comment') }}",
                            data: postData,
                            dataType: "json",
                            success:function(data){
                                window.location.reload()
                            },
                            error:function(jqXHR){
                                  console.log(jqXHR);  
                            }
                        })
                }
            })
        });
        //回复评论
        $('.single-comment').on('click','.button-small',function(){
            var obj=$(this);
            var pid= $(obj).attr('id'),
                name= $(obj).attr('name');
            $('#content').attr('placeholder','@'+name);
            $('.blog-post-leave-comment .active').attr('pid',pid);
        });
    })
</script>
@endsection