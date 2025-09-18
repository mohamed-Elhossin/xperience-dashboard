@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Instructors</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Instructors</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('instructors.create') }}" class="btn btn-success btn-sm mb-3">Add Instructor</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search name or email..." class="form-control" value="{{ $search }}">
        </form>
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>LinkedIn</th>
                    <th>Field</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instructors as $inst)
                <tr>
                    <td>{{ $inst->name }}</td>
                    <td>{{ $inst->email }}</td>
                    <td>{{ $inst->phone }}</td>
                    <td>
                        <a href="{{ $inst->linkedIn }}" target="_blank" class="text-primary text-decoration-underline">Profile</a>
                    </td>
                    <td>
                        <a href="{{ route('fields.show', $inst->field->id) }}" class="text-primary text-decoration-underline">
                            {{ $inst->field->name }}
                        </a>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('instructors.show', $inst->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('instructors.edit', $inst->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('instructors.destroy', $inst->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete instructor?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $instructors->links() }}
    </div>
</div>
@endsection
