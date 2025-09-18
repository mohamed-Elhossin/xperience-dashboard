@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Feedback Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('feedback.index') }}">Feedback</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-start mb-3 gap-2 flex-wrap">
        <a href="{{ route('feedback.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this feedback?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <h3 class="fw-bold mb-3">{{ $feedback->title }}</h3>
    <dl class="row mb-0">
        <dt class="col-sm-3 text-secondary">Description:</dt>
        <dd class="col-sm-9">{{ $feedback->description ?? 'N/A' }}</dd>
        <dt class="col-sm-3 text-secondary">Image:</dt>
        <dd class="col-sm-9">
            @if($feedback->image)
                <img src="{{ asset('feedback/' . $feedback->image) }}" alt="Feedback image" style="max-width: 300px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            @else
                N/A
            @endif
        </dd>
    </dl>
</div>
@endsection
