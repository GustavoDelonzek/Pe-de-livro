<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'biography',
        'birth',
        'nationality',
        'img_url'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

}
