<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SocialUser;

class Comment extends Model
{
	// 用于递归
    private $child = [];
	protected $table = 'comments';
    protected $fillable = [
        'social_users_id','type','pid','article_id','content','status','name','avatar','ip'
    ];
    public function getCommentById($id)
    {
    	$map = [
            'comments.article_id' => $id,
            'comments.pid'        => 0,
        ];
        // 关联第三方用户表获取一级评论
        $data = $this
            ->select('comments.*')
            ->where($map)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
        foreach ($data as $k => $v) {
            $data[$k]['content'] = htmlspecialchars_decode($v['content']);
            // 获取二级评论
            $this->child = [];
            $this->getTree($v);
            $child = $this->child;
            if (!empty($child)) {
                // 按评论时间asc排序
                uasort($child, function ($a, $b) {
                    $prev = $a['created_at'] ?? 0;
                    $next = $b['created_at'] ?? 0;
                    if ($prev == $next) {
                        return 0;
                    }

                    return ($prev < $next) ? -1 : 1;
                });
                foreach ($child as $m => $n) {
                    $child[$m]['reply_name'] = $this->where('id', $n['pid'])->value('name');
                }
            }
            $data[$k]['child'] = $child;
        }

        return $data;
    }
    public function getTree($data)
    {
        $map = [
            'pid' => $data['id'],
        ];
        $child = $this
            ->select('comments.*')
            ->where($map)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        if (!empty($child)) {
            foreach ($child as $k => $v) {
                $v['content']  = htmlspecialchars_decode($v['content']);
                $this->child[] = $v;
                $this->getTree($v);
            }
        }
    }
    public function user()
    {
        return $this->belongsTo('App\Models\SocialUser','social_users_id','id');
    }
    public function article()
    {
        return $this->belongsTo('App\Models\Article','article_id','id');
    }
}