@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Create Content</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('section_contents.index') }}">Contents</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <a href="{{ route('section_contents.index') }}" class="btn btn-secondary mb-3">Back to Contents</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('section_contents.store') }}">
            @csrf

            <div class="mb-3 form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}">
                @error('title')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="section_id">Section</label>
                <select name="section_id" id="section_id" class="form-select @error('section_id') is-invalid @enderror">
                    <option value="">Select Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                            {{ $section->name }} ({{ $section->payCourse->name ?? 'No Course' }})
                        </option>
                    @endforeach
                </select>
                @error('section_id')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-success">Create Content</button>
        </form>
    </div>
</div>
@endsection
