@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Feedback</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Feedback</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('feedback.create') }}" class="btn btn-success btn-sm mb-3">Add Feedback</a>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $fb)
                <tr>
                    <td>{{ $fb->title }}</td>
                    <td>{{ Str::limit($fb->description, 40) }}</td>
                    <td>
                        @if($fb->image)
                            <img src="{{ asset('feedback/' . $fb->image) }}" alt="Feedback image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('feedback.show', $fb->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('feedback.edit', $fb->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('feedback.destroy', $fb->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete feedback?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $feedbacks->links() }}
    </div>
</div>
@endsection
