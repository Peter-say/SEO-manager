<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogNiche()
    {
        return $this->hasMany(BlogNiche::class);
    }
}
