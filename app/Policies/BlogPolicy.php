<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createBlog(Blog $blog)
    {
        $user = Auth::user();
        if ($user->role = 'is_admin' || $user->role == 'is_moderator' || $user->role == 'is_author') {
            return $blog;
        }
    }
}
