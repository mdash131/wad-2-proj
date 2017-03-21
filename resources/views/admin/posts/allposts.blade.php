@extends('layouts.dashboard')
@section('content')
<h2 class="sub-header"><a href="{{ url('/admin/posts/allposts') }}">All Post</a></h2>
<div class="row">
	<div class="col-md-9">
		<a href="{{ url('admin/posts/new-post') }}" class="btn btn-primary btn-sm">Add New Post</a>
	</div>
	<div class="col-md-3">
		{!! Form::open(['method'=>'GET','url'=>'admin/posts/','class'=>'navbar-form navbar-left','role'=>'search']) !!}
		<div class="input-group custom-search-form">
			<input type="text" name="search" class="form-control" placeholder="Search ....">
			<span class="input-group-btn">
				<button style="padding: 7px;" type="submit" class="btn btn-default btn-sm">
					Go !!<i class="fa fa-search"></i>
				</button>
			</span>
		</div>
		{!! Form::close() !!}
	</div>
</div>

<div class="table-responsive">
	<table class=" table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Body</th>
				<th>Link-2-Post</th>
				<th>Image</th>
				<th>Created At</th>
				<th style="align-items: center;">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach($posts as $post)
			<tr>
				<td>{{$no++}}</td>
				<td>{{ $post -> title }}</td>
				<td>{{ $post -> description }}</td>
				<td>{!! str_limit($post->body, $limit= 120, $end = '......') !!}</td>
				<td>{!! ('<a href='.url("/".$post->slug).'>'.$post->slug.'</a>') !!}</td>
				<td><img src="{{ url('img/'.$post->images)}}" id="showimages" style="max-width: 100px;max-height: 100px;float: left;"></td>
				<td>{{ $post -> created_at }}</td>
				
				<form class="" action="" method="post">
				<input type="hidden" name="_method" value="delete">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<td><a href="{{ url('admin/posts/editpost/'.$post->slug)}}" class="btn btn-primary btn-xs">
				edit
				</a></td>
				<td><a href="{{ url('admin/posts/deletepost/'.$post->id.'?_token='.csrf_token()) }}" onclick="return confirm('Are you sure you want to delete data');" class="btn btn-danger btn-xs">
				delete</a>
				</form></td>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    {!! $posts->links() !!}
</div>
@endsection










