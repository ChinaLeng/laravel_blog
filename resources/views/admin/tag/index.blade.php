@extends('admin.layouts.app')

@section('title', '标签列表')
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
		<h4 class="page-title">标签列表</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
			<li>
				<a href="{{ route('admins.tag.index') }}">标签</a>
			</li>
			<li class="active">
				列表
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
            		 <a href="{{ route('admins.tag.create') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
            	</div>
			</div>

			<table data-toggle="table" class="table table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>名称</th>
						<th class="text-center">添加时间</th>
						<th class="text-center">操作</th>
					</tr>
				</thead>

				@if(count($list))
				<tbody>
					@foreach($list as $val)
					<tr>
						<td>{{ $val->id }}</td>
						<td>{{ $val->name }}</td>
						<td>{{ $val->created_at }}</td>
						<td>
							<a href="{{ route('admins.tag.edit',$val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5">编辑</a>
							<a href="{{ route('admins.tag.del',$val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5">删除</i></a>
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