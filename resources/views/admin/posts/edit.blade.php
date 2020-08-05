@extends('admin.base')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@section('main')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route( 'admin_home' ) }}">Admin Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route( 'posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit post</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit post</h1>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('posts.update', $post->id) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $post->slug }}" />
                </div>
                <div class="form-group">
                    <label for="teaser">Teaser:</label>
                    <input type="text" class="form-control" name="teaser" value="{{ $post->teaser }}" />
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name="body" style="height: 300px;">{{ $post->body }}</textarea>
                    <script>
                        CKEDITOR.replace( 'body' );
                        console.log('ckeditor:', CKEDITOR.config);
                        CKEDITOR.config.height = 350;
                    </script>

                </div>
                <button type="submit" class="btn btn-primary">Save Post</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('input[name="title"]').on('input', function(ev) {
        $('input[name="slug"]').val( string_to_slug( $(this).val() ) );
    });

    function string_to_slug (str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
    
        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    }
</script>
@endsection