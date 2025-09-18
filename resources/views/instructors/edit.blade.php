@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Instructor</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('instructors.index') }}">Instructors</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary btn-sm mb-3">Back to Instructors</a>
        <form method="POST" action="{{ route('instructors.update', $instructor->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $instructor->name) }}">
                @error('name')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $instructor->phone) }}">
                @error('phone')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $instructor->email) }}">
                @error('email')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label>LinkedIn URL</label>
                <input type="url" name="linkedIn" class="form-control @error('linkedIn') is-invalid @enderror" value="{{ old('linkedIn', $instructor->linkedIn) }}">
                @error('linkedIn')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label>Field</label>
                <select name="field_id" class="form-select @error('field_id') is-invalid @enderror">
                    <option value="">Select Field</option>
                    @foreach($fields as $field)
                        <option value="{{ $field->id }}" {{ old('field_id', $instructor->field_id) == $field->id ? 'selected' : '' }}>
                            {{ $field->name }}
                        </option>
                    @endforeach
                </select>
                @error('field_id')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label>CV File</label>
                @if($instructor->cv)
                    <a href="{{ asset('instructors/cv/' . $instructor->cv) }}" target="_blank" class="d-block mb-2 text-decoration-underline text-primary">
                        Download Current CV
                    </a>
                @endif
                <input type="file" name="cv" class="form-control @error('cv') is-invalid @enderror">
                @error('cv')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection
