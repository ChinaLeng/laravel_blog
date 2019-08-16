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
		$user    = SocialUser::count();
		$article = Article::count();
		$message = Message::count();
		$comment = Comment::count();
		$comment_list = Comment::with('user')->orderBy('created_at', 'desc')->take(8)->get();
		$message_list = Message::orderBy('created_at', 'desc')->take(8)->get();
		return view('admin.index.index',compact('user','article','message','comment','comment_list','message_list'));
	}
}