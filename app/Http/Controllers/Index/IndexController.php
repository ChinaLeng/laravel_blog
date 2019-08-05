<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Article;

class IndexController extends BaseController
{
	public function index()
	{
		$article = Article::with('user')->orderBy('created_at','desc')->simplePaginate(3);
		return view('index.home.index',compact('article'));
	}
	public function about()
	{
		return view('index.contact.index');
	}
	public function topics($id)
	{
		$article = Article::with(['articletag','user'])->find($id);
		//dd(Article::with(['articletag'])->find($id)->articletag->tag_id);
		return view('index.topics.index',compact('article'));
	}
}