@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Partner Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-start mb-3 gap-2 flex-wrap">
        <a href="{{ route('partners.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this partner?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <h3 class="fw-bold mb-3">{{ $partner->name }}</h3>
    <dl class="row mb-0">
        <dt class="col-sm-3 text-secondary">LinkedIn:</dt>
        <dd class="col-sm-9">
            @if($partner->linkedIn)
                <a href="{{ $partner->linkedIn }}" target="_blank" class="text-primary text-decoration-underline">{{ $partner->linkedIn }}</a>
            @else
                N/A
            @endif
        </dd>
        <dt class="col-sm-3 text-secondary">Description:</dt>
        <dd class="col-sm-9">{{ $partner->description ?? 'N/A' }}</dd>
        <dt class="col-sm-3 text-secondary">Image:</dt>
        <dd class="col-sm-9">
            @if($partner->image)
                <img src="{{ asset('partners/' . $partner->image) }}" alt="{{ $partner->name }}" style="max-width: 300px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            @else
                N/A
            @endif
        </dd>
    </dl>
</div>
@endsection
