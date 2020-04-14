@extends('admin.layouts.app')

@section('title', '留言列表')
@section('stylesheet')
	<link href="/admin/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('script')
	<script src="/admin/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script src="/admin/pages/jquery.bs-table.js"></script>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title">留言列表</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
			<li class="active">
				留言列表
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">

		@include('shared._errors')

		<div class="card-box">
			<!-- <div class="row">
            	<div class="col-sm-4">
            		 <a href="{{ route('admins.tag.create') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
            	</div>
			</div> -->

			<table data-toggle="table" class="table table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>内容</th>
						<th>用户名</th>
						<th>邮箱</th>
						<th>ip</th>
						<th>网站链接</th>
						<th class="text-center">评论时间</th>
						<th class="text-center">操作</th>
					</tr>
				</thead>

				@if(count($list))
				<tbody>
					@foreach($list as $val)
					<tr>
						<td>{{ $val->id }}</td>
						<td>{{ $val->content }}</td>
						<td>{{ $val->name }}</td>
						<td>{{ $val->email }}</td>
						<td>{{ $val->ip }}</td>
						<td>{{ $val->url }}</td>
						<td>{{ $val->created_at }}</td>
						<td>
							@if($val->status == 1)
							<a href="{{ route('admins.message.hide',$val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5">隐藏</a>
							@else
							<a href="{{ route('admins.message.show',$val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5">显示</a>
							@endif
							<a href="{{ route('admins.message.del',$val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5">删除</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				@endif
			</table>

			@include('shared._page')
		</div>
	</div>
</div>

@endsection