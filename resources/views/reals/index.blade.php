@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Reals</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Reals</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('reals.create') }}" class="btn btn-success btn-sm mb-3">Add New Real</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search by title or URL..." class="form-control" value="{{ $search }}">
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Pay Course</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reals as $real)
                <tr>
                    <td>{{ $real->title }}</td>
                    <td><a href="{{ $real->url }}" target="_blank" class="text-primary text-decoration-underline">{{ $real->url }}</a></td>
                    <td>
                        <a href="{{ route('pay-courses.show', $real->payCourse->id) }}" class="text-primary text-decoration-underline">
                            {{ $real->payCourse->name }}
                        </a>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('reals.show', $real->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('reals.edit', $real->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('reals.destroy', $real->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reals->links() }}
    </div>
</div>
@endsection
