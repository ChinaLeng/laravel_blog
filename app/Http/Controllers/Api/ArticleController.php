<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Queries\ArticleQuery;

class ArticleController extends BaseController
{
	/**
	 * 首页文章列表
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function index(Request $request,ArticleQuery $query)
	{
		$article = $query->getSql()->paginate(10);
		return  $this->response(ArticleResource::collection($article));
	}
	/**
	 * 获取置顶文章
	 * @return [type] [description]
	 */
	public function indexTop(Request $request,ArticleQuery $query){
		$article = $query->getSql()->where('is_top',1)->get();
		return ArticleResource::collection($article);
	}
	/**
	 * 文章详情获取
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id){
 		$article = Article::findOrFail($id);
        return new ArticleResource($article);
	}
	/**
	 * 获取归档
	 * @return [type] [description]
	 */
	public function file(){
		$file = Article::getAllArticle();
		return response()->json(['data'=>$file]);
	}
}