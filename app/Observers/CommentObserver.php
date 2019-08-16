<?php
namespace App\Observers;
use App\Models\Comment;
use DB;
use App\Jobs\SendCommentEmail;

class CommentObserver
{
    /**
     * 监听数据创建后的事件。
     * @param  User $user
     * @return void
     */
    public function created(Comment $comment)
    {
        if($comment->pid != 0){
            $id = $comment->pid;
            $comments = DB::table('comments')->where('id',$id)->first();
            if(!empty($comments->social_users_id)){
                $article = DB::table('articles')->where('id',$comments->article_id)->first(['id','slug']);
                $name = DB::table('social_users')->where('id',$comment->social_users_id)->first(['email','name']);
                //评论链接
                $url = route('index.topics',[$article->id,$article->slug]).'#'.$comment->id.'_'.$name->name;
                $content = ['url'=>$url];
                if(!empty($name->email)){
                    dispatch(new SendCommentEmail($name->email, $content, '评论回复'));
                }
            }
        }
    }
}