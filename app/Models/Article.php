<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use DB;

class Article extends Model
{
	protected $table = 'articles';
    protected $fillable = [
        'user_id','title','author','content','keywords','is_top','reply_count','view_count','is_reply','slug','is_release','image'
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
        $files = Article::select(DB::raw('YEAR(created_at) as pub_date,count(*) as cou'))->where('is_release',1)->groupBy('pub_date')->orderBy('pub_date', 'desc')->get()->toArray();
        return $files;
    }
    public static function getAllArticle()
    {
        $files = Article::select('title','id','created_at','slug',DB::raw('YEAR(created_at) as pub_date'))->where('is_release',1)->orderBy('pub_date', 'desc')->orderBy('created_at','desc')->get()->toArray();
        $data = [];
        foreach ($files as $key => $value) {
            $v = ['id'=>$value['id'],'title'=>$value['title'],'created_at'=>$value['created_at'],'slug'=>$value['slug']];
            $data[$files[$key]['pub_date']][] = $v;
            // $data[$files[$key]['pub_date']]['cr_time'] = $value['created_at'];
        };
        return $data;
    }
    public static function get_day()
    {
        $h=date("H");
        if($h<11){
            return "早上好!☼";
        }else if($h<13){ 
            return "中午好！☼";
        }else if($h<17){
            return "下午好！☼";
        }else{ 
            return "晚上好！☽";
        };
    }
}