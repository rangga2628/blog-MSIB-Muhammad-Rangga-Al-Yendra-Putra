@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Author</h1>

        <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                <input type="file" class="form-control" name="profile_photo" id="profile_photo">
            </div>
        
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
        
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
        
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
        
            <div class="form-group">
                <label for="biography">Biography</label>
                <textarea class="form-control" name="biography" id="biography" rows="4"></textarea>
            </div>
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Create Author</button>
        </form>
        
    </div>
@endsection
