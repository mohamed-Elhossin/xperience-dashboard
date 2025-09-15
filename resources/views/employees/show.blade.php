@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Employee Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Employee Details</li>
        </ol>
    </nav>
</div>
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
        <a href="{{ route('employees.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this employee?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <h3 class="fw-bold mb-3">Owner: {{ $employee->owner->name ?? 'N/A' }}</h3>
    <dl class="row mb-1">
        <dt class="col-sm-3 text-secondary">LinkedIn:</dt>
        <dd class="col-sm-9">
            @if($employee->linkedIn)
                <a href="{{ $employee->linkedIn }}" target="_blank" class="text-primary text-decoration-underline">{{ $employee->linkedIn }}</a>
            @else
                N/A
            @endif
        </dd>
        <dt class="col-sm-3 text-secondary">Field:</dt>
        <dd class="col-sm-9">{{ $employee->field->name ?? 'N/A' }}</dd>
    </dl>
</div>
@endsection
