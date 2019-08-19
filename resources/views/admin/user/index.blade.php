@extends('admin.layouts.app')

@section('title', '用户列表')
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
		<h4 class="page-title">用户列表</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
			<li class="active">
				用户列表
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">

		@include('shared._errors')

		<div class="card-box">

			<table data-toggle="table" class="table table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>来源</th>
						<th>头像</th>
						<th>名称</th>
						<th>登录IP</th>
						<th>邮箱</th>
						<th>管理员</th>
						<th class="text-center">添加时间</th>
					</tr>
				</thead>

				@if(count($list))
				<tbody>
					@foreach($list as $val)
					<tr>
						<td>{{ $val->id }}</td>
						@if($val->socialite_client_id == 1)
						<td>QQ</td>
						@elseif($val->socialite_client_id == 2)
						<td>新浪微博</td>
						@else
						<td>github</td>
						@endif
						<td style="width: 100px;"><img style="width: 80px;height: 80px;" src="{{ $val->avatar }}"></td>
						<td>{{ $val->name }}</td>
						<td>{{ $val->last_login_ip }}</td>
						<td>{{ $val->email }}</td>
						<td>{{ $val->is_admin?'是':'否' }}</td>
						<td>{{ $val->created_at }}</td>
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