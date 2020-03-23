<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SocialUser;
use App\Models\Comment;
use App\Models\Message;

class IndexController extends BaseController
{
	/**
	 * 网站首页
	 * @return [type] [description]
	 */
	public function index()
	{
		//http://api.zjh336.cn/bt/sjtx/api.php?lx=c1
		//// 随机姓氏
//var_dump($name->randomSurname());
// 随机名字（不含姓氏）
//var_dump($name->randomFirstName());
// 随机全名
//var_dump($name->randomFullName());
		$user    = SocialUser::count();
		$article = Article::count();
		$message = Message::count();
		$comment = Comment::count();
		$comment_list = Comment::with('user')->orderBy('created_at', 'desc')->take(8)->get();
		$message_list = Message::orderBy('created_at', 'desc')->take(8)->get();
		return view('admin.index.index',compact('user','article','message','comment','comment_list','message_list'));
	}
}