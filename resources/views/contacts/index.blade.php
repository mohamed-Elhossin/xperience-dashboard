@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Contacts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Contacts</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('contacts.create') }}" class="btn btn-success btn-sm mb-3">Add Contact</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search contacts..." class="form-control" value="{{ $search ?? '' }}">
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td class="text-end">
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
</div>
@endsection
