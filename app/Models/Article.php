<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use DB;

class Article extends Model
{
	protected $table = 'articles';
    protected $fillable = [
        'user_id','title','author','content','keywords','is_top','reply_count','view_count','is_reply','slug'
    ];
    public function articletag()
    {
        return $this->hasOne('App\Models\ArticleTag','article_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\SocialUser','user_id','id');
    }
    public function getTag($ids)
    {
        $list = Tag::whereIn('id',explode(',', $ids))->get();
        return $list;
    }
    public static function getFile()
    {
        $files = Article::select(DB::raw('YEAR(created_at) as pub_date,count(*) as cou'))->groupBy('pub_date')->orderBy('pub_date', 'desc')->get()->toArray();
        return $files;
    }
    public static function getAllArticle()
    {
        $files = Article::select('title','id','created_at','slug',DB::raw('YEAR(created_at) as pub_date'))->orderBy('pub_date', 'desc')->get()->toArray();
        $data = [];
        foreach ($files as $key => $value) {
            $v = ['id'=>$value['id'],'title'=>$value['title'],'created_at'=>$value['created_at'],'slug'=>$value['slug']];
            $data[$files[$key]['pub_date']][] = $v;
            // $data[$files[$key]['pub_date']]['cr_time'] = $value['created_at'];
        };
        return $data;
    }
}