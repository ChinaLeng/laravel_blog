<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends BaseController
{
	/**
	 * 评论列表
	 * @return [type] [description]
	 */
	public function index()
	{
		$list = Comment::with('article')->orderBy('created_at', 'desc')->paginate(10);
		return view('admin.comment.index',compact('list'));
	}
	/**
	 * 隐藏评论
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function hide($id)
	{
		Comment::where('id',$id)->update(['status'=>0]);
		return redirect()->route('admins.comment.index')->with('success', '修改成功');
	}
	/**
	 * 显示评论
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id)
	{
		Comment::where('id',$id)->update(['status'=>1]);
		return redirect()->route('admins.comment.index')->with('success', '修改成功');
	}
}