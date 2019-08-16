@extends('index.layouts.app')
@section('title','友情链接')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-detail pdb80 white-bg">
                <div class="inner">
                    <div class="blog-post-comment-box">
                        <div class="heading"><h3><span class="base-color"></span>条评论</h3></div>
                        <div class="all-comments">
                            <div class="single-comment" >
                                <div class="vertical-image-text">
                                    <a href="" style="display: block;">
                                    <div class="text">
                                        <div class="name-date"><h5>友链</h5></div>
                                        <p >评论已被屏蔽</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
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