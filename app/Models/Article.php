<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

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
}