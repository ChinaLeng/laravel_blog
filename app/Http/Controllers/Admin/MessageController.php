<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends BaseController
{
	/**
	 * 留言列表
	 * @return [type] [description]
	 */
	public function index()
	{
		$list = Message::orderBy('created_at', 'desc')->paginate(10);
		return view('admin.message.index',compact('list'));
	}
	/**
	 * 隐藏评论
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function hide($id)
	{
		message::where('id',$id)->update(['status'=>0]);
		return redirect()->route('admins.message.index')->with('success', '修改成功');
	}
	/**
	 * 显示评论
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id)
	{
		message::where('id',$id)->update(['status'=>1]);
		return redirect()->route('admins.message.index')->with('success', '修改成功');
	}
}