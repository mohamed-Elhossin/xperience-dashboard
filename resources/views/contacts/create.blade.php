@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Add Contact</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Contacts</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm mb-3">Back to Contacts</a>
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <div class="mb-3 form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}">
                @error('subject')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                @error('message')<div class="alert alert-warning mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-success btn-sm">Send</button>
        </form>
    </div>
</div>
@endsection
