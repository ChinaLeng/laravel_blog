<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SocialUser;
use App\Models\Comment;

class IndexController extends BaseController
{
	public function index()
	{
		$article = Article::with('user')->orderBy('created_at','desc')->simplePaginate(3);
		return view('index.home.index',compact('article'));
	}
	public function about()
	{
		return view('index.contact.index');
	}
	public function topics($id,Comment $commentModel)
	{
		$article = Article::with(['articletag','user'])->find($id);
		dd($commentModel->getCommentById($id));
		return view('index.topics.index',compact('article'));
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
        $id = Comment::create($request->only('article_id', 'content', 'pid') + [
            'social_users_id' => $user_id,
            'status'          => 1,
        ]);
        if(!$id){
        	return response()->json(['code'=>500,'msg'=>'服务器错误'], 500);
        }
        return response()->json(['code'=>200,'msg'=>'评论成功'], 200);
	}
}