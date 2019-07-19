@extends('index.layouts.app')
@section('purpose','留言板')
@section('content')
<div class="container white-bg pr">
    <div class="row">
        <div class="col-md-8">
            <div class="easy-contact-box">
                <div class="">
                    <div class="heading">
                        <h3>留言</h3>
                    </div>
                    <div class="leave-comment-box" id="hui">
                        <form action="#">
                            <div class="name-email-website-field">
                                <div class="form-group">
                                    <input type="text" placeholder="姓名" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="郵箱" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="url" placeholder="你的網站鏈接" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="内容" rows="8" cols="80"></textarea>
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
                    		陳政寬<br> 一位渣渣PHP開發者<br>我很慶幸我找到了喜歡做的事,但我很煩惱爲什麽離它越來越遠<br>
                    		希望能在這個領域找到一份工作,并能一直做下去💗
                    	</div>
                    </div>
                </aside><!--/.recent-post-widget-->
            </div>
        </div>


        <div class="col-md-12" style="box-shadow: 0 0 10px rgba(171, 171, 171, 0);">
            <div class="blog-detail pdb80 white-bg" style="padding-top: 0;">
                <div class="inner" style="max-width: 100%;">
                	<div class="blog-post-comment-box" style="margin-top: 0;">
                        <div class="heading"><h3>共<span class="base-color">5</span>条留言</h3></div>
                        <div class="all-comments">
                            <div class="single-comment">
                                <div class="vertical-image-text">
<!--                                     <div class="image">
                                        <img src="images/author1.jpg" alt="author1.jpg" class="img-circle">
                                    </div> -->
                                    <div class="text">
                                        <div class="name-date"><h4>Julia Fox</h4><span>April 22, 2917</span></div>
                                        <p>On the other hand, we denounce with righteous</p>
                                    </div>
                                    <div class="replay">
                                        <a href="#hui" class="easy-button button-small">回復</a>
                                    </div>
                                </div>
                                <div class="replay-comment single-comment">
                                    <div class="vertical-image-text">
<!--                                         <div class="image">
                                            <img src="images/author1.jpg" alt="author1.jpg" class="img-circle">
                                        </div> -->
                                        <div class="text">
                                            <div class="name-date"><h4>Julia Fox</h4><span>April 22, 2917</span></div>
                                            <p>On the other hand, we denounce with righteous</p>
                                        </div>
                                        <div class="replay">
                                            <a href="#hui" class="easy-button button-small">回復</a>
                                        </div>
                                    </div>
                                </div><!--/.single-comment-->
                            </div><!--/.single-comment-->
                            <div class="single-comment">
                                <div class="vertical-image-text">
<!--                                     <div class="image">
                                        <img src="images/author1.jpg" alt="author1.jpg" class="img-circle">
                                    </div> -->
                                    <div class="text">
                                        <div class="name-date"><h4>Julia Fox</h4><span>April 22, 2917</span></div>
                                        <p>On the other hand, we denounce with righteous</p>
                                    </div>
                                    <div class="replay">
                                        <a href="#hui" class="easy-button button-small">回復</a>
                                    </div>
                                </div>
                            </div><!--/.single-comment-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection