@extends('admin.base')

@section('main')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route( 'admin_home' ) }}">Admin Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Posts</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-8 offset-2">
        <h1 class="display-3">Posts</h1>
        <div class="display-3 pull-right"><a class="btn btn-primary" href="{{ route('posts.create') }}">Create New Post</a></div>

        @if (count($posts) == 0)
            <div class="alert alert-info" style="margin-top: 20px;">
                <h5>Nothing to see here.</h5>
            </div>
        @else
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Teaser</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->teaser }}</td>
                        <td>
                        <div style="float: left; padding-right: 10px;">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show</a>
                            </div>
                            <div style="float: left; padding-right: 10px;">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form style="display:block; float:left;" action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</buttton>
                            </form>
                            <br clear="left" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

        
    </div>
</div>
@endsection