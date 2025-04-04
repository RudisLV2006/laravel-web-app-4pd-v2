<?php

namespace App\Policies;

use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, Comment $comment): bool
    {
        if($comment->user_id === $user->id){
            return true;
        }
        if($comment->post->user_id === $user->id){
            return true;
        }
        return false;
    }
}
