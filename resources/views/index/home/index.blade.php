@extends('index.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            @foreach($article as $k => $v)
            <div class="blog-layout-one blog-item1">
                <div class="overlay"></div>
                <div class="text">
                    <h3><a href="#">{{ $v->title }}</a></h3>
                    <div class="meta-info">
                        <span>作者<a href="#">{{ $v->user->name }}</a></span>
                        <span>发布<a href="#">于</a></span>
                        <span><a href="#">{{ $v->created_at->diffForHumans() }}</a></span>
                    </div>
                </div>
                <div class="right-read-more">
                    <a href="#" class="read-more"><i class="icon-right-arrow"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {!! $article->appends(Request::except('page'))->render() !!}
    <div class="row">
        <div class="col-md-12">
            <div class="pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection