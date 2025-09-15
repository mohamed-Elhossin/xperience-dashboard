@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Employees</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Employees</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm mb-3">Add Employee with Owner</a>
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Owner Name</th>
                    <th>Employee LinkedIn</th>
                    <th>Field</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $emp)
                <tr>
                    <td>{{ $emp->owner->name ?? 'N/A' }}</td>
                    <td>@if($emp->linkedIn)<a href="{{ $emp->linkedIn }}" target="_blank" class="text-primary text-decoration-underline">{{ $emp->linkedIn }}</a>@else N/A @endif</td>
                    <td>{{ $emp->field->name ?? 'N/A' }}</td>
                    <td class="text-end">
                        <a href="{{ route('employees.show', $emp->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $employees->links() }}
    </div>
</div>
@endsection
