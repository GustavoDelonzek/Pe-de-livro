<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function books(){
        return $this->belongsToMany(Book::class, 'book_genre', 'genre_id', 'book_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'user_genre', 'genre_id', 'user_id');
    }
}
