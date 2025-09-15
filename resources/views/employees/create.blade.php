@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add Employee and Owner</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Employee</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <h4>Owner Info</h4>
            <div class="mb-3 form-group">
                <label for="owner_name">Owner Name</label>
                <input type="text" name="owner[name]" id="owner_name" class="form-control @error('owner.name') is-invalid @enderror" value="{{ old('owner.name') }}">
                @error('owner.name')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="owner_email">Owner Email</label>
                <input type="email" name="owner[email]" id="owner_email" class="form-control @error('owner.email') is-invalid @enderror" value="{{ old('owner.email') }}">
                @error('owner.email')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="owner_password">Owner Password</label>
                <input type="password" name="owner[password]" id="owner_password" class="form-control @error('owner.password') is-invalid @enderror">
                @error('owner.password')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <hr>

            <h4>Employee Info</h4>

            <div class="mb-3 form-group">
                <label for="linkedIn">LinkedIn (URL)</label>
                <input type="url" name="linkedIn" id="linkedIn" class="form-control @error('linkedIn') is-invalid @enderror" value="{{ old('linkedIn') }}">
                @error('linkedIn')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="image">Image URL/Text</label>
                <textarea name="image" id="image" class="form-control @error('image') is-invalid @enderror">{{ old('image') }}</textarea>
                @error('image')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="field_id">Field</label>
                <select name="field_id" id="field_id" class="form-select @error('field_id') is-invalid @enderror" required>
                    <option value="">Select Field</option>
                    @foreach(\App\Models\Field::all() as $field)
                        <option value="{{ $field->id }}" {{ old('field_id') == $field->id ? 'selected' : '' }}>
                            {{ $field->name }}
                        </option>
                    @endforeach
                </select>
                @error('field_id')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-success btn-sm">Create Employee & Owner</button>
        </form>
    </div>
</div>
@endsection
