<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\ArticleTag;

class ArticleController extends BaseController
{
	/**
	 * 文章首页
	 * @return [type] [description]
	 */
	public function index()
	{
		$list = Article::orderBy('id','desc')->paginate(20);
		return view('admin.article.index',compact('list'));
	}
	/**
	 * 新增文章
	 * @return [type] [description]
	 */
	public function create()
	{
		$tag = Tag::all();
		return view('admin.article.create',compact('tag'));
	}
	public function store(Request $request)
	{
		$data = [
			'title'      => $request->post('title'),
			'content'    => $request->post('content'),
			'keywords'   => $request->post('keywords'),
			'is_top'     => $request->post('is_top'),
			'view_count' => $request->post('view_count'),
			'is_reply'   => $request->post('is_reply'),
			'user_id'    => $this->getUserId(),
			'author'     => $this->getUserName(),
		];
		$article = Article::create($data);
		//添加标签
		if($request->has('article_tag')){
			$tag_id = implode(",", $request->post('article_tag'));
			ArticleTag::create(['article_id'=>$article->id,'tag_id'=>$tag_id]);
		}
		return redirect()->route('admins.article.index')->with('success', '创建成功');
	}
	/**
	 * 文章的更新
	 * @param  Article $article [description]
	 * @return [type]           [description]
	 */
	public function edit(Article $article)
	{
		$tag = Tag::all();
		return view('admin.article.create',compact('tag','article'));
	}
	public function update(Request $request,Article $article)
	{
		$data = [
			'title'      => $request->post('title'),
			'content'    => $request->post('content'),
			'keywords'   => $request->post('keywords'),
			'is_top'     => $request->post('is_top'),
			'view_count' => $request->post('view_count'),
			'is_reply'   => $request->post('is_reply'),
		];
		$article->update($data);
		//添加标签
		if($request->has('article_tag')){
			$tag_id = implode(",", $request->post('article_tag'));
			ArticleTag::where('article_id',$article->id)->update(['tag_id'=>$tag_id]);
		}
		return redirect()->route('admins.article.index')->with('success', '修改成功');
	}
	public function del(Article $article)
	{
		$article->delete();
		return redirect()->route('admins.article.index')->with('success', '删除成功');
	}
}