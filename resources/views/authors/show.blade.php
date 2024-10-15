@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Author Details</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h3>{{ $author->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Username:</strong> {{ $author->username }}</p>
                <p><strong>Email:</strong> {{ $author->email }}</p>
                <p><strong>Biography:</strong> {{ $author->biography }}</p>
                <img src="{{ asset('storage/'.$author->profile_photo) }}" alt="Profile Photo" width="150">
            </div>
        </div>

        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
