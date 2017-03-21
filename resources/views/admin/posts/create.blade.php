@extends('layouts.dashboard')
@section('content')
<h2>Create New Post</h2> <div class="col-sm-9 main">
  <div class="table-responsive" id="list" style="margin-left: 2em;margin-right: 2em;">
<table class="table table-bordered table-hover table-condensed">
<form action="{{ url('/admin/posts/createpost') }}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
	<p>Title</p>
	<input type="text" name="title" value="{{ old('title') }}" required="required" placeholder="Enter Title here" class="form-cotrol" style="width: 50em;"><br>
	<p>Description</p>
	<input type="text" name="description" value="{{ old('description') }}" required="required" placeholder="Enter Description here" class="form-cotrol" style="width: 50em;"> <br> <br>
	<p>Thumbnail</p>
	<img id = "showimages" style="max-width: 200px;max-height: 200px;float: left;"/>
	<div class="row">
		<div class="col-md-12">
			<input required="required" type="file" id="inputimages" name="images">
		</div>
		
	</div>

	</div>

	<div class="form-group">
		<textarea required="required" name='body' class="form-cotrol" rows="20" cols="150"></textarea>
	</div>
	<input type="submit" name='publish' class="btn btn-success" value="Publish">
	
</form>
</table>
</div>
</div>


@endsection