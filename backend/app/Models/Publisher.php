<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'website',
        'contact'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function books(){
        return $this->hasMany(Book::class);

    }

    
}
