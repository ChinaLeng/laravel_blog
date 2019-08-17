@extends('index.layouts.app')
@section('title','友情链接')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-detail pdb80 white-bg">
                <div class="inner">
                    <div class="blog-post-comment-box">
                        <div class="heading"><h3><span class="base-color">{{ count($list) }}</span>条友链</h3></div>
                        <div class="all-comments">
                            <div class="single-comment" >
                                @foreach($list as $k => $v)
                                @if($k+1 == count($list))
                                <a href="{{ $v->url }}" target="_blank" style="display: block;padding-top: 10px;padding-bottom: 10px;">
                                @else
                                <a href="{{ $v->url }}" target="_blank" style="display: block;border-bottom: 1px solid rgba(164, 181, 224, 0.17);padding-top: 10px;padding-bottom: 10px;">
                                @endif
                                <div class="vertical-image-text">
                                    <div class="text">
                                        <div class="name-date"><h5>{{ $v->name }}</h5></div>
                                        <p >{{ $v->brief }}</p>
                                    </div>
                                </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
