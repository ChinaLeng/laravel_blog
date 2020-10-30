<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;

class IndexController extends BaseController
{
	public function index(Request $request)
	{
		$article = Article::where('is_release',1)->select('id','title','image')->orderBy('created_at','desc')->paginate(10);
		return $article;
	}
}