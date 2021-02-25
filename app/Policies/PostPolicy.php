<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Post $post)
    {
        //
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Post $post)
    {
        return $user->id==$post->user_id;
    }
    public function delete(User $user, Post $post)
    {
        return $user->id==$post->user_id;
    }
    public function removeImage(User $user, Post $post){
        if($this->update($user, $post)){
            return false;
        }
        return $post->image_path!=null;
    }

}
