@extends('admin.base')

@section('main')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route( 'admin_home' ) }}">Admin Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route( 'posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Show post</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">{{ $post->title }}</h1>
        <p>{{ date( "F j, Y, g:i:sa", strtotime($post->updated_at) ) }}</p>
        <h3 style="margin: 20px 0; padding: 20px 0; border-top: 1px solid #999;">{{ $post->teaser }}</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        {!! $post->body !!}

        <div>
            <a class="btn btn-info" href="{{ route('posts.index') }}">Back to Posts</a>
            <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit post</a>    
        </div>
    </div>
</div>
@endsection