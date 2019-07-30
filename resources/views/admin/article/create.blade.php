@extends('admin.layouts.app')

@section('title', '文章')
@section('stylesheet')
    <link href="/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <script src="/admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="/summernote/dist/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote({
            lang: 'zh-CN',
                placeholder: '请在此输入内容...',
                height: 400,
                width:800,
                callbacks:{
                    //图片文件上传
                    onImageUpload: function(files, editor, $editable) {
                       data = new FormData();  
                       data.append("file", files[0]);
                       data.append('_token','{{csrf_token()}}');
                     $.ajax({  
                         data : data,  
                         type : "POST",  
                         url : "{{ route('admins.upimg') }}",   
                         cache : false,  
                         contentType : false,  
                         processData : false,  
                         dataType : "json",  
                         success: function(data) {
                             if(data.success){
                                $('#summernote').summernote('insertImage', data.file_path); 
                             }else{
                               alert("上传失败"); 
                             }   
                         },  
                         error:function(){  
                             alert("上传失败");  
                         }  
                     }); 
                }
            }
          });
        });
        $('form').on('submit', function (){
            var count = $("#summernote").summernote("code");
            $('#content').val(count);

            return true;
        });
    </script>
    @if(isset($article))
    <script type="text/javascript">
    var str = "{{ $article->articletag->tag_id }}";
    var arr = str.split(',');
    $('#fruits').val(arr);
    $('#fruits').selectpicker('refresh');
    </script>
    @endif
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title">{{ isset($article) ? '编辑' : '新增' }}文章</h4>
		<ol class="breadcrumb">
			<li>
				<a href="#">管理</a>
			</li>
            <li>
				<a href="{{ route('admins.article.index') }}">文章</a>
			</li>
			<li class="active">
			    {{ isset($article) ? '编辑' : '新增' }}
			</li>
		</ol>
	</div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(isset($article))
            <form class="form-horizontal" role="form" action="{{ route('admins.article.update',$article->id) }}" method="POST">
        @else
            <form class="form-horizontal" role="form" action="{{ route('admins.article.store') }}" method="POST">
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
                            	<input type="text" class="form-control" name="title" placeholder="请输入标题" required  value="{{ $article->title ?? old('title') }}">
                            </div>
                        </div>
                        @if(!$tag->isEmpty())
                        <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">标签</label>
                                <div class="col-md-4">
                                    <select id="fruits" name="article_tag[]" class="selectpicker" multiple>
                                      @foreach($tag as $val)
                                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                                      @endforeach
                                    </select>
                                </div>
                        </div>
                        @endif
                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">关键词</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="keywords" placeholder="请输入关键词" required  value="{{ $article->keywords ?? old('keywords') }}">
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">内容</label>
                            <div class="col-md-10">
                                <input type="hidden" id="content" name="content" value="">
                                <div id="summernote" style="height: 400px;">{!! $article->content ?? old('content') !!}</div>
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-15 col-md-2 control-label">置顶</label>

                            <div class="col-md-6">
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio1" value="1" {{ isset($article->is_top) && $article->is_top == 1 ? 'checked' : '' }} name="is_top">
                                    <label for="inlineRadio1"> 是 </label>
                                </div>
                                <div class="radio radio-inline ">
                                    <input type="radio" id="inlineRadio2" value="0" {{ isset($article->is_top) && $article->is_top == 0 ? 'checked' : '' }} name="is_top" checked>
                                    <label for="inlineRadio2"> 否 </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="m-b-15 col-md-2 control-label">评论</label>

                            <div class="col-md-6">
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio1" value="1" {{ isset($article->is_reply) && $article->is_reply == 1 ? 'checked' : '' }} name="is_reply" checked>
                                    <label for="inlineRadio1"> 开启 </label>
                                </div>
                                <div class="radio radio-inline ">
                                    <input type="radio" id="inlineRadio2" value="0" {{ isset($article->is_reply) && $article->is_reply == 0 ? 'checked' : '' }} name="is_reply">
                                    <label for="inlineRadio2"> 关闭 </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-20">
                            <label class="col-md-2 control-label">查看数</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="view_count" placeholder="请输入查看数" required  value="{{ $article->view_count ?? 0 }}">
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