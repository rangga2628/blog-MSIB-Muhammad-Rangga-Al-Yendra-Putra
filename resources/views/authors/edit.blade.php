
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Author</h1>

        <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                <img src="{{ asset('storage/'.$author->profile_photo) }}" alt="Profile Photo" width="100" class="mt-2">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $author->name }}" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ $author->username }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $author->email }}" required>
            </div>

            <div class="form-group">
                <label for="biography">Biography</label>
                <textarea class="form-control" name="biography" id="biography" rows="4">{{ $author->biography }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Author</button>
        </form>
    </div>
@endsection
