@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Create Section</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Sections</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <a href="{{ route('sections.index') }}" class="btn btn-secondary mb-3">Back to Sections</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('sections.store') }}">
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
                <textarea name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="hours">Hours</label>
                <input type="number" name="hours" id="hours"
                    class="form-control @error('hours') is-invalid @enderror"
                    value="{{ old('hours') }}">
                @error('hours')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="pay_course_id">Pay Course</label>
                <select name="pay_course_id" id="pay_course_id" class="form-select @error('pay_course_id') is-invalid @enderror">
                    <option value="">Select a course</option>
                    @foreach ($payCourses as $course)
                        <option value="{{ $course->id }}" {{ old('pay_course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('pay_course_id')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-success">Create Section</button>
        </form>
    </div>
</div>
@endsection
