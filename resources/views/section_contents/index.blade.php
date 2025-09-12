@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Section Contents</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Section Contents</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <a href="{{ route('section_contents.create') }}" class="btn btn-success mb-3">Add New Content</a>

        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search content or sections..." class="form-control" value="{{ $search }}">
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Section</th>
                    <th>Pay Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>
                        <a href="{{ route('sections.show', $content->section->id) }}" class="text-decoration-underline text-primary">
                            {{ $content->section->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('pay-courses.show', $content->section->payCourse->id) }}" class="text-decoration-underline text-primary">
                            {{ $content->section->payCourse->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('section_contents.show', $content->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('section_contents.edit', $content->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('section_contents.destroy', $content->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this content?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contents->links() }}
    </div>
</div>
@endsection
