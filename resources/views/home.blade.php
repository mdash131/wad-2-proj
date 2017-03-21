@extends('layouts.app')

@section('header')
 <header class="intro-header" style="background-image: url('img/booksimage-bg.jpg'); width: 80em;margin-left: -20em;height: 20em;">

 <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="site-heading">
            <h1 style=" background-color: #000000;opacity: .9; border-radius: 20px;">BookDB</h1>
            <hr class="small">
            <span class="subheading"></span>
            </div>
            </div>
@endsection

@section('content')
    @if (!$posts->count())
    There is still no post here. Login now and write a new post!!
    @else
    @foreach ($posts as $post)
    <h2 class="post-title">
        <a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
    </h2> 
    <p class="post-subtitle">
        {!! str_limit($post->body, $limit= 120, $end = '......<a href='.url("/".$post->slug).' >Read More</a>') !!}
    </p>
    <p class="post-meta">
        {{ $post->created_at->format('M d,Y \a\t h:i a') }} By {{ $post->author->name }}
    </p>
    @endforeach
    @endif
@endsection

@section('pagination')
<div class="row">
    <hr>
    {!! $posts->links() !!}
</div>
@endsection