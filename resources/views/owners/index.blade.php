@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Owners</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Owners</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('owners.create') }}" class="btn btn-success btn-sm mb-3">Add Owner</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search by name or email..." class="form-control" value="{{ $search }}">
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email Verified</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($owners as $owner)
                <tr>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>
                        @if($owner->email_verified_at)
                            <span class="badge bg-success">Verified</span>
                        @else
                            <span class="badge bg-secondary">Not Verified</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('owners.show', $owner->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete owner?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $owners->links() }}
    </div>
</div>
@endsection
