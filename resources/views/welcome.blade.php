@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-2" style="padding-top: 100px;">
        <h1 class="display-3">tsqware</h1>
        <h4>This is where you see the site. {{ $whereAmI }}</h4>

        @foreach ( $posts as $post )
        
            <div style="margin-top: 40px; padding-bottom:40px; margin-bottom: 40px; border-bottom: 1px solid #e6e6e6;">
                <h2>{{ $post->title }}</h2>
                <p>{{ date( "F j, Y, g:i:sa", strtotime($post->updated_at) ) }}</p>
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
