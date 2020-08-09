@extends('base')

@section('main')
<div class="post-container mx-auto">
    <div class="col">
        <div class="col" style="padding: 40px 0 20px;">
            <h1>tsqware</h1>
            <h4 class="banner">Design. Development. Strategy</h4>
        </div>

        @foreach ( $posts as $post )
        
            <div style="margin-top: 40px; padding-bottom:40px; margin-bottom: 40px; border-bottom: 1px solid #e6e6e6;">
                <h2>{{ $post->title }}</h2>
                <p class="post-date">{{ date( "F j, Y, g:i:sa", strtotime($post->updated_at) ) }}</p>
                <div>
                    {!! $post->body !!}
                </div>
                <div>
                    <a class="btn btn-light" href="{{ route('show_post', $post->slug) }}">Read More</a>
                </div>
            </div>
        
            
        
        @endforeach
    </div>
    <div class="col-sm-8 offset-2">
        <div class="float-right">{{ $posts->links() }}</div>
    </div>
</div>
@endsection
