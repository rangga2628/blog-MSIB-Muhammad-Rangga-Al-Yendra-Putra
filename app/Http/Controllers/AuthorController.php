<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Menampilkan semua author
    public function index() {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    // Menampilkan halaman form untuk membuat author baru
    public function create() {
        return view('authors.create');
    }

    // Menyimpan author baru
    public function store(Request $request) {
        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:25|unique:authors,username',
            'email'         => 'required|email|unique:authors,email',
            'password'      => 'required|string|max:25',
            'biography'     => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            $profilePhotoPath = null;
            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('asset-images', 'public');
            }

            Author::create([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'password'      => $request->password, 
                'biography'     => $request->biography,
                'profile_photo' => $profilePhotoPath,
            ]);

            return redirect()->route('authors.index')->with('success', 'Author created successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }

    public function show(Author $author) {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author) {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author) {
        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:25|unique:authors,username,' . $author->id,
            'email'         => 'required|email|unique:authors,email,' . $author->id,
            'password'      => 'nullable|string|max:25',
            'biography'     => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try {
            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('asset-images', 'public');
                $author->profile_photo = $profilePhotoPath;
            }

            $author->name = $request->name;
            $author->username = $request->username;
            $author->email = $request->email;
            $author->biography = $request->biography;

            if ($request->password) {
                $author->password = bcrypt($request->password);
            }

            $author->save();

            return redirect()->route('authors.index')->with('success', 'Author updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }

    public function destroy(Author $author) {
        try {
            $author->delete();
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }
}
