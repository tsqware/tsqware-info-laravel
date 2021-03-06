@extends('admin.base')

@section('main')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route( 'admin_home' ) }}">Admin Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route( 'contacts.index' ) }}">Contacts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit contact</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($error->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $contact->first_name }}" />
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $contact->email }}" />
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="city" value="{{ $contact->city }}" />
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" name="country" value="{{ $contact->country }}" />
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title:</label>
                    <input type="text" class="form-control" name="job_title" value="{{ $contact->job_title }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update Contact</button>
            </form>
        </form>
    </div>
</div>
@endsection