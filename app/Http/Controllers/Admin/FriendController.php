<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Friend;

class FriendController extends BaseController
{
	/**
	 * 友链列表
	 * @return [type] [description]
	 */
	public function index()
	{
		$list = Friend::paginate(10);
		return view('admin.friend.index',compact('list'));
	}
	/**
	 * 新增友链
	 * @return [type] [description]
	 */
	public function show()
	{
		return view('admin.friend.show');
	}
	public function store(Request $request)
	{
		$data = [
			'name'   => $request->post('name'),
			'brief'  => $request->post('brief'),
			'url'    => $request->post('url'),
		];
		$article = Friend::create($data);
		return redirect()->route('admins.friend.index')->with('success', '创建成功');
	}
	/**
	 * 删除友链
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function hide($id)
	{
		Friend::where('id',$id)->delete();
		return redirect()->route('admins.friend.index')->with('success', '删除成功');
	}
	/**
	 * 修改
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id)
	{
		$friend = Friend::find($id);
		return view('admin.friend.show',compact('friend'));
	}
	public function update(Request $request,$id)
	{
		$data = [
			'name'   => $request->post('name'),
			'brief'  => $request->post('brief'),
			'url'    => $request->post('url'),
		];
		$article = Friend::where('id',$id)->update($data);
		return redirect()->route('admins.friend.index')->with('success', '修改成功');
	}
}