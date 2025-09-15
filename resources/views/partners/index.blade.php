@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Partners</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Partners</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('partners.create') }}" class="btn btn-success btn-sm mb-3">Add Partner</a>
        <form method="GET" class="mb-3">
            <input type="search" name="search" placeholder="Search partners..." class="form-control" value="{{ $search ?? '' }}">
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>LinkedIn</th>
                    <th>Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td>
                        @if($partner->linkedIn)
                        <a href="{{ $partner->linkedIn }}" target="_blank" class="text-primary text-decoration-underline">Profile</a>
                        @else
                        N/A
                        @endif
                    </td>
                    <td>{{ Str::limit($partner->description, 40) }}</td>
                    <td class="text-end">
                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this partner?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $partners->links() }}
    </div>
</div>
@endsection
