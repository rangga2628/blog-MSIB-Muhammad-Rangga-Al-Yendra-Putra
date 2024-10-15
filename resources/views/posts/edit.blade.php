@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="Post image" class="img-thumbnail mt-2" style="width: 150px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="is_published" class="form-check-label">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" {{ $post->is_published ? 'checked' : '' }}>
                Publish
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
@endsection
