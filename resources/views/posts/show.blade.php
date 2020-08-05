@extends('base')

@section('main')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #fff;">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-8 offset-sm-2" style="padding-top: 50px;">
        <h1 class="display-3">{{ $post->title }}</h1>
        <p>{{ date( "F j, Y, g:i:sa", strtotime($post->updated_at) ) }}</p>
        <h3 style="margin: 20px 0; padding: 20px 0; border-top: 1px solid #999;">{{ $post->teaser }}</h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        {!! $post->body !!}

        <div>
            <a class="btn btn-light" href="{{ route( 'home') }}">Back to Posts</a>
        </div>
    </div>
</div>
@endsection