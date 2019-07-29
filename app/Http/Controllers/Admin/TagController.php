<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends BaseController
{
	/**
	 * 标签首页
	 * @return [type] [description]
	 */
	public function index()
	{
		$list = Tag::paginate(20);
		return view('admin.tag.index',compact('list'));
	}
	/**
	 * 标签新增
	 * @return [type] [description]
	 */
	public function create()
	{
		return view('admin.tag.create');
	}
	public function store(Request $request)
	{
		$tag = Tag::create([
			'name' => $request->post('name'),
		]);

		return redirect()->route('admins.tag.index')->with('success', '创建成功');
	}
	/**
	 * 标签编辑
	 * @param  Tag    $tag [description]
	 * @return [type]      [description]
	 */
	public function edit(Tag $tag)
	{
 		return view('admin.tag.create',compact('tag'));
	}
	public function update(Request $request,Tag $tag)
	{
		$tag->update(['name'=>$request->post('name')]);
		return redirect()->route('admins.tag.index')->with('success', '修改成功');
	}
	/**
	 * 标签删除
	 * @param  Tag    $tag [description]
	 * @return [type]      [description]
	 */
	public function del(Tag $tag)
	{
		$tag->delete();
		return redirect()->route('admins.tag.index')->with('success', '删除成功');
	}
}