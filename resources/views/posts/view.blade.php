@extends('layouts.app')

@section('title', 'View Post')

@section('content')
<h1>View Post</h1>

<div class="container">
    @if ($post->image)
        <img src="{{ asset('storage/'.$post->image)}}" alt="Post image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
    @else
        <img src="https://via.placeholder.com/100" alt="Default Image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
    @endif
    <h1>{{ $post->title }}</h1>
    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    <p><strong>Content:</strong> {{ $post->content }}</p>
    <p><strong>Status:</strong> {{ $post->is_published ? 'Published' : 'Not Published' }}</p>
    
    @if($post->image)
        <p><strong>Image:</strong></p>
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 400px;">
    @endif

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
</div>
@endsection
