<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SocialUser;
use App\Models\Comment;
use Cache;

class IndexController extends BaseController
{
	public function index()
	{
		dd(Article::getFile());
		$article = Article::with('user')->orderBy('created_at','desc')->simplePaginate(3);
		return view('index.home.index',compact('article'));
	}
	public function about()
	{
		return view('index.contact.index');
	}
	public function topics($id,Comment $commentModel,Request $request)
	{
		$article = Article::with(['articletag','user'])->find($id);
		$artview = 'article'. $request->ip() . ':' . $id;
		if (!Cache::has($artview)) {
            cache([$artview => ''], 600);
            // 文章点击量+1
            $article->increment('view_count');
        };
		//获取评论
		$comment = $commentModel->getCommentById($id);
		return view('index.topics.index',compact('article','comment'));
	}
	public function checkLogin()
	{
		return response()->json([
            'status' => (int)auth()->guard('social')->check(),
        ]);
		
	}
	public function comment(Request $request)
	{
		$user_id = 1;
		$email = $request->input('email', '');
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            // 修改邮箱
            SocialUser::where('id', $user_id)->update([
                'email' => $email,
            ]);
        }
        // 存储评论
        $data = [
        	'article_id' => $request->input('article_id'),
        	'content' => strip_tags($request->input('content'),"<p><a>"),
        	'pid' => $request->input('pid'),
        	'social_users_id' => $user_id,
        	'status'          => 1,
        ];
        $id = Comment::create($data);
        if(!$id){
        	return response()->json(['code'=>500,'msg'=>'服务器错误'], 500);
        }
        return response()->json(['code'=>200,'msg'=>'评论成功'], 200);
	}
}