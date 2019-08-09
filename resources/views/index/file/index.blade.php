@extends('index.layouts.app')
@section('purpose','文章歸檔')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
        	@foreach($file as $k=>$v)
            <div class="paginations">
				<span>{{ $k }}</span>
            </div>
        	@foreach($v as $y=>$x)
            <a href="{{ route('index.topics',['id'=>$x['id'],'slug'=>$x['slug']]) }}" class="a-block">
	            <div class="paginations">
					<h2>{{ $x['title'] }}</h2>
					<h6 class="time-font">{{ $x['created_at'] }}</h6>
	            </div>
			</a>
			@endforeach
			@endforeach
        </div>
    </div>
</div>
@endsection