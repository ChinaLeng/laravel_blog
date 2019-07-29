<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';
    protected $fillable = [
        'user_id','title','author','content','keywords','is_top','reply_count','view_count','is_reply','slug'
    ];
}