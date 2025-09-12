@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Content Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('section_contents.index') }}">Contents</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>

<div class="card p-4 shadow-sm">
    <a href="{{ route('section_contents.index') }}" class="btn btn-secondary mb-4">Back to Contents</a>

    <h2 class="fw-bold mb-3">{{ $sectionContent->title }}</h2>

    <dl class="row mb-3">
        <dt class="col-sm-3 text-secondary">Section:</dt>
        <dd class="col-sm-9">
            @if($sectionContent->section)
                <a href="{{ route('sections.show', $sectionContent->section->id) }}" class="text-primary text-decoration-underline">
                    {{ $sectionContent->section->name }}
                </a>
            @else
                N/A
            @endif
        </dd>

        <dt class="col-sm-3 text-secondary">Pay Course:</dt>
        <dd class="col-sm-9">
            @if($sectionContent->section && $sectionContent->section->payCourse)
                <a href="{{ route('pay-courses.show', $sectionContent->section->payCourse->id) }}" class="text-primary text-decoration-underline">
                    {{ $sectionContent->section->payCourse->name }}
                </a>
            @else
                N/A
            @endif
        </dd>
    </dl>
</div>
@endsection
