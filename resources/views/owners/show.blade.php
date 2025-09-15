@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Owner Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('owners.index') }}">Owners</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>

<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
        <a href="{{ route('owners.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this owner?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <h3 class="fw-bold mb-3">{{ $owner->name }}</h3>
    <dl class="row mb-0">
        <dt class="col-sm-3 text-secondary">Email:</dt>
        <dd class="col-sm-9">{{ $owner->email }}</dd>
        <dt class="col-sm-3 text-secondary">Email Verified:</dt>
        <dd class="col-sm-9">
            @if($owner->email_verified_at)
                <span class="badge bg-success">Verified</span>
                <span class="small text-muted">{{ $owner->email_verified_at->format('Y-m-d H:i') }}</span>
            @else
                <span class="badge bg-secondary">Not Verified</span>
            @endif
        </dd>
        <dt class="col-sm-3 text-secondary">Created At:</dt>
        <dd class="col-sm-9">{{ $owner->created_at->format('Y-m-d H:i') }}</dd>
        <dt class="col-sm-3 text-secondary">Updated At:</dt>
        <dd class="col-sm-9">{{ $owner->updated_at->format('Y-m-d H:i') }}</dd>
    </dl>
</div>
@endsection
