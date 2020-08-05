@extends('admin.base')

@section('main')
<div class="container">
    <h1 class="display-3">tsqware Admin</h1>
    <h4>{{ __('You are logged in. Time to make some magic.') }} </h4>

    <div class="row justify-content-center" style="margin-top: 40px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <ul style="font-size: 14px;">
                        <li><a href="{{ route( 'posts.index') }}">Posts</a></li>
                        <li><a href="{{ route( 'contacts.index') }}">Contacts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
