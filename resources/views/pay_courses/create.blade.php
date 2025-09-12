@extends('admin.layouts.app')@section('content')
<div class="pagetitle">
    <h1>Add Pay Course</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pay-courses.index') }}">Pay Courses</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('pay-courses.index') }}" class="btn btn-secondary mb-3">Back to Courses</a>
        @if ($errors->any())
        <div class="alert alert-danger"><ul>
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul></div>
        @endif
        <form method="POST" action="{{ route('pay-courses.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                  class="form-control @error('name') is-invalid @enderror"
                  value="{{ old('name') }}">
                @error('name')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="hours">Hours</label>
                <input type="number" name="hours" id="hours" class="form-control @error('hours') is-invalid @enderror" value="{{ old('hours') }}">
                @error('hours')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="contentFile">Content File URL</label>
                <input type="url" name="contentFile" id="contentFile" class="form-control @error('contentFile') is-invalid @enderror" value="{{ old('contentFile') }}">
                @error('contentFile')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="contentDrive">Drive URL</label>
                <input type="url" name="contentDrive" id="contentDrive" class="form-control @error('contentDrive') is-invalid @enderror" value="{{ old('contentDrive') }}">
                @error('contentDrive')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
