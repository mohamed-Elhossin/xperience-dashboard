@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Employee</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Employee</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3 form-group">
                <label for="linkedIn">LinkedIn (URL)</label>
                <input type="url" name="linkedIn" id="linkedIn" class="form-control @error('linkedIn') is-invalid @enderror" value="{{ old('linkedIn', $employee->linkedIn) }}">
                @error('linkedIn')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="image">Image URL/Text</label>
                <textarea name="image" id="image" class="form-control @error('image') is-invalid @enderror">{{ old('image', $employee->image) }}</textarea>
                @error('image')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="field_id">Field</label>
                <select name="field_id" id="field_id" class="form-select @error('field_id') is-invalid @enderror" required>
                    <option value="">Select Field</option>
                    @foreach(\App\Models\Field::all() as $field)
                        <option value="{{ $field->id }}" {{ (old('field_id', $employee->field_id) == $field->id) ? 'selected' : '' }}>
                            {{ $field->name }}
                        </option>
                    @endforeach
                </select>
                @error('field_id')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update Employee</button>
        </form>
    </div>
</div>
@endsection
