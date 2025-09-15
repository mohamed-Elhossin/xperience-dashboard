@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Fields</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Fields</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <a href="{{ route('fields.create') }}" class="btn btn-success mb-3">Add New Field</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search fields..." class="form-control" value="{{ $search }}">
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                <tr>
                    <td>{{ $field->name }}</td>
                    <td>{{ Str::limit($field->description, 40) }}</td>
                    <td class="text-end">
                        <a href="{{ route('fields.show', $field->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('fields.edit', $field->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('fields.destroy', $field->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this field?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $fields->links() }}
    </div>
</div>
@endsection
