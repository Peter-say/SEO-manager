<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogNiche extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function writer()
    {
        return $this->belongsTo(Writer::class, 'blog_niches', 'id');
    }
}
