@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Pay Courses</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Pay Courses</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('pay-courses.create') }}" class="btn btn-success mb-3">Add New Course</a>
        <form class="mb-2" method="GET">
            <input type="search" name="search" class="form-control" placeholder="Search..." value="{{ $search }}">
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Price</th>
                    <th>Hours</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ Str::limit($item->description, 40) }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->hours }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('pay_courses/' . $item->image) }}" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pay-courses.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('pay-courses.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pay-courses.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
</div>
@endsection
