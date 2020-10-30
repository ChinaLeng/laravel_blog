<?php
namespace App\Http\Queries;

use App\Models\Article;

class ArticleQuery
{
	public $article;
    public function __construct()
    {
        // parent::__construct(Article::query());
    }
    public function getSql(){
        return Article::where('is_release',1)
        ->select('id','title','image','created_at')
        ->orderBy('created_at','desc');
    }
}