@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Contact Details</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Contacts</a></li>
            <li class="breadcrumb-item active">Details</li>
        </ol>
    </nav>
</div>
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-start mb-3 gap-2 flex-wrap">
        <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
        <div>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this contact?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <h3 class="fw-bold mb-3">{{ $contact->subject }}</h3>
    <dl class="row mb-0">
        <dt class="col-sm-3 text-secondary">Name:</dt>
        <dd class="col-sm-9">{{ $contact->name }}</dd>
        <dt class="col-sm-3 text-secondary">Email:</dt>
        <dd class="col-sm-9">{{ $contact->email }}</dd>
        <dt class="col-sm-3 text-secondary">Message:</dt>
        <dd class="col-sm-9">{{ $contact->message }}</dd>
    </dl>
</div>
@endsection
