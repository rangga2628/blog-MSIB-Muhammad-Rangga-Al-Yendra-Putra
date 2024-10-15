<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors'; // Ensure this matches the table name in your database

    // Use fillable to specify which fields are mass assignable
    protected $fillable = [
        'profile_photo', // Corrected from 'photo profile'
        'name',
        'biography',
        'username',
        'email',
        'password', // Add this back to fillable for mass assignment, if you want to allow it
    ];

    // If you want to keep the password hidden and not mass assignable, use guarded instead
    // protected $guarded = ['password'];

    // Optionally, use this method to automatically hash the password before saving
    public static function boot()
    {
        parent::boot();

        static::creating(function ($author) {
            if ($author->password) {
                $author->password = bcrypt($author->password); // Hash the password when creating
            }
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
