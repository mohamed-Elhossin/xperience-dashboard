@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Create Field</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('fields.index') }}">Fields</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('fields.index') }}" class="btn btn-secondary mb-3">Back to Fields</a>
        @if ($errors->any())
            <div class="alert alert-danger"><ul>
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul></div>
        @endif
        <form method="POST" action="{{ route('fields.store') }}">
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
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
