@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Instructor Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('instructors.index') }}">Instructors</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0 pb-2">
        <a href="{{ route('instructors.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this instructor?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <div class="card-body pb-3">
        <h3 class="fw-bold mb-3">{{ $instructor->name }}</h3>
        <dl class="row mb-0">
            <dt class="col-sm-3 text-secondary">Phone:</dt>
            <dd class="col-sm-9">{{ $instructor->phone }}</dd>

            <dt class="col-sm-3 text-secondary">Email:</dt>
            <dd class="col-sm-9">{{ $instructor->email }}</dd>

            <dt class="col-sm-3 text-secondary">LinkedIn:</dt>
            <dd class="col-sm-9">
                <a href="{{ $instructor->linkedIn }}" class="text-primary text-decoration-underline" target="_blank">
                    {{ $instructor->linkedIn }}
                </a>
            </dd>

            <dt class="col-sm-3 text-secondary">Field:</dt>
            <dd class="col-sm-9">
                @if($instructor->field)
                    <a href="{{ route('fields.show', $instructor->field->id) }}" class="text-primary text-decoration-underline">
                        {{ $instructor->field->name }}
                    </a>
                    @if($instructor->field->description)
                        <br>
                        <span class="small text-muted">{{ $instructor->field->description }}</span>
                    @endif
                @else
                    N/A
                @endif
            </dd>

            <dt class="col-sm-3 text-secondary">CV:</dt>
            <dd class="col-sm-9">{{ $instructor->cv }}</dd>
        </dl>
    </div>
</div>
@endsection
