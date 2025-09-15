@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Partner</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('partners.index') }}" class="btn btn-secondary btn-sm mb-3">Back to Partners</a>
        <form method="POST" action="{{ route('partners.update', $partner->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $partner->name) }}">
                @error('name')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="linkedIn">LinkedIn URL</label>
                <input type="url" name="linkedIn" id="linkedIn" class="form-control @error('linkedIn') is-invalid @enderror" value="{{ old('linkedIn', $partner->linkedIn) }}">
                @error('linkedIn')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $partner->description) }}</textarea>
                @error('description')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="image">Image</label>
                @if($partner->image)
                    <div class="mb-2">
                        <img src="{{ asset('partners/' . $partner->image) }}" alt="Partner Image" style="max-width: 200px; border-radius: 8px;">
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
