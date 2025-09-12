{{-- resources/views/pay_courses/show.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Pay Course Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pay-courses.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pay-courses.index') }}">Pay Courses</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>

<div class="card p-4 shadow-sm">
    <a href="{{ route('pay-courses.index') }}" class="btn btn-secondary mb-4">Back to Courses</a>
    <div class="row g-4">
        <div class="col-md-5">
            @if($pay_course->image)
                <img src="{{ asset('pay_courses/' . $pay_course->image) }}" alt="Course Image" class="img-fluid rounded shadow-sm border">
            @else
                <div class="text-muted fst-italic bg-light p-5 text-center rounded">No Image Available</div>
            @endif
        </div>

        <div class="col-md-7">
            <h2 class="fw-bold mb-3">{{ $pay_course->name }}</h2>

            <dl class="row mb-3">
                <dt class="col-sm-4 text-secondary">Description:</dt>
                <dd class="col-sm-8">{{ $pay_course->description ?? 'N/A' }}</dd>

                <dt class="col-sm-4 text-secondary">Price:</dt>
                <dd class="col-sm-8">${{ number_format($pay_course->price, 2) ?? 'N/A' }}</dd>

                <dt class="col-sm-4 text-secondary">Hours:</dt>
                <dd class="col-sm-8">{{ $pay_course->hours ?? 'N/A' }}</dd>

                <dt class="col-sm-4 text-secondary">Content File URL:</dt>
                <dd class="col-sm-8">
                    @if($pay_course->contentFile)
                        <a href="{{ $pay_course->contentFile }}" target="_blank" class="text-primary text-decoration-underline">{{ $pay_course->contentFile }}</a>
                    @else
                        N/A
                    @endif
                </dd>

                <dt class="col-sm-4 text-secondary">Google Drive URL:</dt>
                <dd class="col-sm-8">
                    @if($pay_course->contentDrive)
                        <a href="{{ $pay_course->contentDrive }}" target="_blank" class="text-primary text-decoration-underline">{{ $pay_course->contentDrive }}</a>
                    @else
                        N/A
                    @endif
                </dd>
            </dl>

            <a href="{{ route('pay-courses.edit', $pay_course->id) }}" class="btn btn-primary me-2">Edit</a>
            <form action="{{ route('pay-courses.destroy', $pay_course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this course?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
