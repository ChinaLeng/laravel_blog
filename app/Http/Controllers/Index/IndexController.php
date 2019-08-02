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
}