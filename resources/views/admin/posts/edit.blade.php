@extends('layouts.dashboard')
@section('content')
<h2>Update Post</h2>
  <div class="col-sm-9 main">
  <div class="table-responsive" id="list" style="margin-left: 2em;margin-right: 2em;">
<table class="table table-bordered table-hover table-condensed">
<form action="{{ url('/admin/posts/updatepost') }}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id')}}">
	<input type="hidden" name="post_description" value="{{ $post->id }}{{ old('post_id')}}">
	
	
	<div class="form-group">
	<p>Title</p>
	<input type="text" name="title" value="@if(!old('title')){{$post->title}}@endif{{ old('title')}}" required="required" placeholder="Enter Title here" class="form-cotrol" style="width: 50em;"><br>
	<p>Description</p>
	<input type="text" name="description" value="@if(!old('description')){{$post->description}}@endif{{ old('description')}}" required="required" placeholder="Enter Description here" class="form-cotrol" style="width: 50em;"> <br> <br>
	<p>Thumbnail</p>
	<img src="{{ url('img/'.$post->images) }}" id = "showimages" style="max-width: 200px;max-height: 200px;float: left;"/>
	<div class="row">
		<div class="col-md-12">
			<input type="file" id="inputimages" name="images">
		</div>
		
	</div>

	</div>

	<div class="form-group">
		<textarea required="required" name='body' class="form-cotrol" rows="20" cols="150">
			@if(!old('body')){{$post->body}}@endif{{ old('body')}}
		</textarea>
	</div>

	@if($post->active == '1')
	<input type="submit" name='publish' class="btn btn-success" value="Update"/>
	@else
	<input type="submit" name='publish' class="btn btn-success" value="Publish">
	@endif

	
<a href="{{ url('admin/posts/deletepost/'.$post->id.'?_token='.csrf_token()) }}" onclick="return confrim('Are you sure you want to delete data');" class="btn btn-danger">Delete</a>

</form>
</table>
</div>
</div>



@endsection