<?php
namespace App\Observers;
use App\Models\Message;
use DB;
use App\Jobs\SendCommentEmail;
use Illuminate\Support\Facades\Mail;

class MessageObserver
{
    /**
     * 监听数据创建后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function created(Message $messagee)
    {
        if($messagee->pid != 0){
            $id = $messagee->pid;
            $messages = DB::table('messages')->where('id',$id)->first();
            if(!empty($messages->email)){
                //评论链接
                $url = config('app.url').'/about#'.$messagee->id.'_'.$messagee->name;
                $content = ['url'=>$url];
                dispatch(new SendCommentEmail($messages->email, $content, '留言回复'));
            }
        }
    }
}