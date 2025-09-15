@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Field Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('fields.index') }}">Fields</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>

<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
        <a href="{{ route('fields.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('fields.edit', $field->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('fields.destroy', $field->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this field?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <h3 class="fw-bold mb-3">{{ $field->name }}</h3>
    <dl class="row mb-0">
        <dt class="col-sm-3 text-secondary">Description:</dt>
        <dd class="col-sm-9">{{ $field->description ?? 'N/A' }}</dd>
    </dl>
</div>
@endsection
