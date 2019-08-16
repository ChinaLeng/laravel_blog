@extends('admin.layouts.app')

@section('title', '友链')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title">{{ isset($friend) ? '编辑' : '新增' }}友链</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
            <li>
				<a href="{{ route('admins.article.index') }}">友链</a>
			</li>
			<li class="active">
			    {{ isset($friend) ? '编辑' : '新增' }}
			</li>
		</ol>
	</div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(isset($friend))
            <form class="form-horizontal" role="form" action="{{ route('admins.friend.update',$friend->id) }}" method="POST">
        @else
            <form class="form-horizontal" role="form" action="{{ route('admins.friend.store') }}" method="POST">
        @endif
        	{{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">

                	@include('shared._errors')

                    <div class="card-box">
                        <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">标题</label>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" name="name" placeholder="请输入名称" required  value="{{ $friend->name ?? old('name') }}">
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">链接</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="url" placeholder="请输入简介" required value="{{ $friend->url ?? old('url') }}">
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">简介</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="brief" placeholder="请输入简介"   value="{{ $friend->brief ?? old('brief') }}">
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                        	<label class="col-md-2"></label>
                        	<div class="col-md-6">
                        		<button type="submit" class="btn w-sm btn-default waves-effect waves-light">保存</button>
                        	</div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
	</div>
</div>
@endsection