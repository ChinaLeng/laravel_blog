<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends BaseController
{
	public function index()
	{
		$list = Article::paginate(20);
		return view('admin.article.index',compact('list'));
	}
	public function create()
	{
		$tag = Tag::all();
		return view('admin.article.create');
	}
}