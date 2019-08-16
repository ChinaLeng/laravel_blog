<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	// 用于递归
    private $child = [];
	protected $table = 'messages';
    protected $fillable = [
        'name','ip','url','pid','content','status','email'
    ];
    public  function getMessageAll()
    {
    	$map = [
            'pid'        => 0,
        ];
        $data = $this
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
                    // 获取被评论人名字
                    $replyUserName = $this->where('id', $n['pid'])->value('name');
                    $child[$m]['reply_name'] = $replyUserName;
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
}