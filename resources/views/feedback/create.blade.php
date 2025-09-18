@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add Feedback</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('feedback.index') }}">Feedback</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('feedback.index') }}" class="btn btn-secondary btn-sm mb-3">Back to Feedback</a>
        <form method="POST" action="{{ route('feedback.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </form>
    </div>
</div>
@endsection
