<?php

namespace App\Models\Application;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Writer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function niche()
    {
        return $this->belongsTo(BlogNiche::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function applied($user)
    {
        // Auth::user()->has();
    }
}
