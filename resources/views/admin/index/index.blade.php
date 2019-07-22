
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
	            <div class="bg-icon bg-icon-info pull-left">
	                <i class="md md-attach-money text-info"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">11</b></h3>
	                <p class="text-muted">用户数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-pink pull-left">
	                <i class="md md-add-shopping-cart text-pink"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">22</b></h3>
	                <p class="text-muted">文章数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-purple pull-left">
	                <i class="md md-equalizer text-purple"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">33</b></h3>
	                <p class="text-muted">评论数</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-success pull-left">
	                <i class="md md-remove-red-eye text-success"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">44</b></h3>
	                <p class="text-muted">单页数</p>
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
							<th class="text-center">操作</th>
						</tr>
					</thead>


				</table>
			</div>
	    </div>

	</div>

	<div class="row">
		<div class="col-lg-12">
	        <div class="card-box">
				<h4 class="text-dark header-title m-t-0 p-b-10">最新文章</h4>

				<table data-toggle="table" class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>标题</th>
							<th>分类</th>
							<th>标签</th>
							<th>浏览量</th>
							<th>评论数</th>
							<th>发布时间</th>
							<th>状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					
				</table>
			</div>
		</div>
	</div>

@endsection
