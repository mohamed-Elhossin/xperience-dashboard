@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Feedback</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('feedback.index') }}">Feedback</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('feedback.index') }}" class="btn btn-secondary btn-sm mb-3">Back to Feedback</a>
        <form method="POST" action="{{ route('feedback.update', $feedback->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $feedback->title) }}">
                @error('title')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $feedback->description) }}</textarea>
                @error('description')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="image">Image</label>
                @if($feedback->image)
                    <div class="mb-2">
                        <img src="{{ asset('feedback/' . $feedback->image) }}" alt="Feedback image" style="max-width: 120px; border-radius: 8px;">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection
