
@extends('admin.layouts.app')

@section('title', '仪表盘')

@section('stylesheet')
	<link rel="stylesheet" href="/admin/plugins/morris/morris.css">
	<link href="/admin/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
	<script src="/admin/plugins/morris/morris.min.js"></script>
	<script src="/admin/pages/jquery.dashboard.js"></script>
	<script src="/admin/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script src="/admin/pages/jquery.bs-table.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".knob").knob();
        });
    </script>
@endsection

@section('content')
	<!-- Page-Title -->
	<div class="row">
	    <div class="col-sm-12">
	        <h4 class="page-title">仪表盘</h4>
	        <p class="text-muted page-title-alt">欢迎来到 Lara 仪表盘 !</p>
	    </div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			@include('shared._errors')
		</div>
	</div>

	<div class="row">
	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box fadeInDown animated">
	            <div class="bg-icon bg-icon-info pull-left" style="width: 75%;">
	                <img style="width: 40%;height: 65px;" src="/admin/images/yonghu.png">
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $user }}</b></h3>
	                <p class="text-muted">用户数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-info pull-left" style="width: 75%;">
	                <img style="width: 40%;height: 75px;" src="/admin/images/wenzhang.png">
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $article }}</b></h3>
	                <p class="text-muted">文章数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-info pull-left" style="width: 75%;">
	                <img style="width: 40%;height: 75px;" src="/admin/images/pinglun.png">
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $comment }}</b></h3>
	                <p class="text-muted">评论数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-info pull-left" style="width: 75%;">
	                <img style="width: 40%;height: 75px;" src="/admin/images/liuyan.png">
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">{{ $message }}</b></h3>
	                <p class="text-muted">留言数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>
	</div>

	<div class="row">

<!--  -->

	    <div class="col-lg-8">
	        <div class="card-box">
				<h4 class="text-dark header-title m-t-0 p-b-10">最新评论</h4>

				<table data-toggle="table" class="table table-condensed mails">
					<thead>
						<tr>
							<th class="w80">ID</th>
							<th>用户</th>
							<th>内容</th>
							<th>时间</th>
							<th class="text-center">状态</th>
						</tr>
					</thead>
					@if(count($comment_list))
					<tbody>
						@foreach($comment_list as $val)
						<tr>
							<td>{{ $val->id }}</td>
							<td>{{ $val->content }}</td>
							<td>{{ $val->user->name }}</td>
							<td>{{ $val->created_at->diffForHumans() }}</td>
							<td><span class="label label-table {{ $val->status == 1 ? 'label-default' : 'label-warning' }}">{{ $val->status == 1 ? '显示' : '隐藏' }}</span></td>
							
						</tr>
						@endforeach
					</tbody>
					@endif

				</table>
			</div>
	    </div>

	</div>

	<div class="row">
		<div class="col-lg-12">
	        <div class="card-box">
				<h4 class="text-dark header-title m-t-0 p-b-10">最新留言</h4>

				<table data-toggle="table" class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>名字</th>
							<th>IP</th>
							<th>邮箱</th>
							<th>网站链接</th>
							<th>内容</th>
							<th>发布时间</th>
							<th>状态</th>
							<!-- <th class="text-center">操作</th> -->
						</tr>
					</thead>
					@if(count($message_list))
					<tbody>
						@foreach($message_list as $val)
						<tr>
							<td>{{ $val->id }}</td>
<!--  -->
							<td>{{ $val->name }}</td>
							<td>{{ $val->ip }}</td>
							<td>{{ $val->email }}</td>
							<td>{{ $val->url }}</td>
							<td>{{ $val->content }}</td>
							<td>{{ $val->created_at->diffForHumans() }}</td>
							<td><span class="label label-table {{ $val->status == 1 ? 'label-default' : 'label-warning' }}">{{ $val->status == 1 ? '显示' : '隐藏' }}</span></td>
							
						</tr>
						@endforeach
					</tbody>
					@endif
					
				</table>
			</div>
		</div>
	</div>

@endsection
