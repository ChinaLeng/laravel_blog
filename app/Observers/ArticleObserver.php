<?php
namespace App\Observers;
use App\Models\Article;
use App\Handlers\SlugTranslateHandler;
use App\Handlers\GetBingImgHandler;

class ArticleObserver
{
	/**
	 * 监听数据即将保存的事件。
	 * @param  Topic  $topic [description]
	 * @return [type]        [description]
	 */
    public function saving(Article $Article)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $Article->slug) {
             $Article->slug = app(SlugTranslateHandler::class)->translate($Article->title);
        }
        //没有图片  获取图片
        if ( ! $Article->image) {
             $Article->image = app(GetBingImgHandler::class)->translate();
        }
    }
}