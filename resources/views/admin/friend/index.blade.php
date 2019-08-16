@extends('admin.layouts.app')

@section('title', '友链列表')
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
		<h4 class="page-title">友链列表</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
			<li class="active">
				友链列表
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">

		@include('shared._errors')

		<div class="card-box">
			<div class="row">
            	<div class="col-sm-4">
            		 <a href="{{ route('admins.friend.show') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
            	</div>
			</div>

			<table data-toggle="table" class="table table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>网站名称</th>
						<th>简介</th>
						<th>链接</th>
						<th class="text-center">操作</th>
					</tr>
				</thead>

				@if(count($list))
				<tbody>
					@foreach($list as $val)
					<tr>
						<td>{{ $val->id }}</td>
						<td>{{ $val->name }}</td>
						<td>{{ $val->brief }}</td>
						<td>{{ $val->url }}</td>
						<td>
							<a href="{{ route('admins.friend.edit',$val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5">编辑</a>
							<a href="{{ route('admins.friend.hide',$val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5">删除</a>
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