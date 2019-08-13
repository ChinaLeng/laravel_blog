<?php
namespace App\Observers;
use App\Models\Comment;

class CommentObserver
{
    /**
     * 监听数据创建后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function created(Comment $comment)
    {
        //dd($comment);
    }
}