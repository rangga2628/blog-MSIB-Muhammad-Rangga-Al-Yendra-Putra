@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <h1>Category: {{ $category->name }}</h1>
    <p>Description: {{ $category->description }}</p>

    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to Categories</a>
@endsection
