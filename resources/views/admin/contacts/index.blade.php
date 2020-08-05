@extends('admin.base')

@section('main')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route( 'admin_home' ) }}">Admin Home</a></li>
        <li class="breadcrumb-item active">Contacts</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-8 offset-2">
        <h1 class="display-3">Contacts</h1>
        <div class="display-3 pull-right"><a class="btn btn-primary" href="{{ route('contacts.create') }}">Create New Contact</a></div>

        @if (count($contacts) == 0)
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->job_title }}</td>
                        <td>{{ $contact->city }}</td>
                        <td>{{ $contact->country }}</td>
                        <td>
                            <div style="float: left; padding-right: 10px;">
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form style="display:block; float:left;" action="{{ route('contacts.destroy', $contact->id) }}" method="post">
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