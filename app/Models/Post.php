<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Enable mass assignment for these attributes
    protected $fillable = ['title', 'content', 'author'];
}
