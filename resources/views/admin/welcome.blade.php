@extends('admin.base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-2" style="padding-top: 100px;">
        <h1 class="display-3">tsqware Admin</h1>
        <h4>This is where you make the site.</h4>
        <div class="row">
            <div class="w-300">
                <ul style="font-size: 18px;">
                    <li><a href="{{ route( 'posts.index') }}">Posts</a></li>
                    <li><a href="{{ route( 'contacts.index') }}">Contacts</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
