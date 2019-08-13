<?php
namespace App\Observers;
use App\Models\Message;
use DB;

class MessageObserver
{
    /**
     * 监听数据创建后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function created(Message $message)
    {
        if($message->pid != 0){
            $id = $message->pid;
            $email = DB::table('messages')->where('id',$id)->value('email');
            if(!empty($email)){

            }
        }
    }
}