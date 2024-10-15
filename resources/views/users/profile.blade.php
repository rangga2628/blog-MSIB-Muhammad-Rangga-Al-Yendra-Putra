@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h1 class="mb-4">Profil Pengguna</h1>
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Bio:</strong> {{ $user->bio ?? 'Tidak ada bio' }}</p>
            <p><strong>Peran:</strong> {{ $user->role }}</p>

            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
