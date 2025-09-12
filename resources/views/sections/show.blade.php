{{-- resources/views/sections/show.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Section Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Sections</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>

<div class="card p-4 shadow-sm">
    <a href="{{ route('sections.index') }}" class="btn btn-secondary mb-4">Back to Sections</a>

    <div class="row g-4">
        <div class="col-md-12">
            <h2 class="fw-bold mb-3">{{ $section->name }}</h2>

            <dl class="row mb-3">
                <dt class="col-sm-3 text-secondary">Description:</dt>
                <dd class="col-sm-9">{{ $section->description ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-secondary">Hours:</dt>
                <dd class="col-sm-9">{{ $section->hours ?? 'N/A' }}</dd>

                <dt class="col-sm-3 text-secondary">Related Pay Course:</dt>
                <dd class="col-sm-9">
                    @if($section->payCourse)
                        <a href="{{ route('pay-courses.show', $section->payCourse->id) }}" class="text-primary text-decoration-underline">
                            {{ $section->payCourse->name }}
                        </a>
                    @else
                        N/A
                    @endif
                </dd>
            </dl>

            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary me-2">Edit</a>
            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this section?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
