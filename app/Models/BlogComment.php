<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = [ 'blog_id', 'username' , 'email'];
    use HasFactory;

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
