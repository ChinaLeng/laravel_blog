<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SocialUser;
use App\Models\Comment;
use App\Models\Message;

class SocialUsersController extends BaseController
{
	/**
	 * 网站首页
	 * @return [type] [description]
	 */
	public function index()
	{
		$list    = SocialUser::paginate(20);
		return view('admin.user.index',compact('list'));
	}
}