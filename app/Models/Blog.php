<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [

        'user_id',
        'blog_description',
        'blog_title',
        'category_id',
        'meta_title',
        'meta_description',
        'cover_image',
        'blog_url'

    ];

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id');
    }

    public function blogAuthor()
    {
        //
    }

    public function getRouteKeyName()
    {
        return 'blog_url';
    }
}
