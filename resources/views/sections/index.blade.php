@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Sections</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Sections</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <a href="{{ route('sections.create') }}" class="btn btn-success mb-3">Add New Section</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search sections..." class="form-control" value="{{ $search }}">
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Pay Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->name }}</td>
                    <td>{{ Str::limit($section->description, 40) }}</td>
                    <td>{{ $section->hours }}</td>
                    <td>{{ $section->payCourse->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('sections.show', $section->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirm delete?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $sections->links() }}
    </div>
</div>
@endsection
