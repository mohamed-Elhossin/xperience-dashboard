@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add Partner</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('partners.index') }}" class="btn btn-secondary btn-sm mb-3">Back to Partners</a>
        <form method="POST" action="{{ route('partners.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="linkedIn">LinkedIn URL</label>
                <input type="url" name="linkedIn" id="linkedIn" class="form-control @error('linkedIn') is-invalid @enderror" value="{{ old('linkedIn') }}">
                @error('linkedIn')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
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
