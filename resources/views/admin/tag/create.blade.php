@extends('admin.layouts.app')

@section('title', '标签')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title">{{ isset($tag) ? '编辑' : '新增' }}标签</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
            <li>
				<a href="{{ route('admins.tag.index') }}">标签</a>
			</li>
			<li class="active">
			    {{ isset($tag) ? '编辑' : '新增' }}
			</li>
		</ol>
	</div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(isset($tag))
            <form class="form-horizontal" role="form" action="{{ route('admins.tag.update',$tag->id) }}" method="POST">
        @else
            <form class="form-horizontal" role="form" action="{{ route('admins.tag.store') }}" method="POST">
        @endif
        	{{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">

                	@include('shared._errors')

                    <div class="card-box">
                        <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">名称</label>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" name="name" placeholder="请输入标签名称" required max="20" value="{{ $tag->name ?? old('name') }}">
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