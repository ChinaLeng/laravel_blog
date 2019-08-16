<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SocialUser;
use App\Models\Comment;
use App\Models\Message;
use App\Models\ArticleTag;
use Cache;
use Validator;
use DB;

class IndexController extends BaseController
{
	/**
	 * 文章列表
	 * @return [type] [description]
	 */
	public function index()
	{
		$article = Article::with('user')->orderBy('created_at','desc')->simplePaginate(3);
		/*$articles = Article::query();
		$articles->with('user');
		$articles->orderBy('created_at','desc');
		$articles->simplePaginate(3);
		$article = $articles->get()->toArray();*/
		return view('index.home.index',compact('article'));
	}
	/**
	 * 关于我
	 * @return [type] [description]
	 */
	public function about(Message $message)
	{
		//获取留言
		$message = $message->getMessageAll();
		return view('index.contact.index',compact('message'));
	}
	/**
	 * 文章详情
	 * @param  [type]  $id           [description]
	 * @param  Comment $commentModel [description]
	 * @param  Request $request      [description]
	 * @return [type]                [description]
	 */
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
	/**
	 * 判断是否登录
	 * @return [type] [description]
	 */
	public function checkLogin()
	{
		return response()->json([
            'status' => (int)auth()->guard('social')->check(),
        ]);
		
	}
	/**
	 * 文章评论
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
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
	/**
	 * 归档
	 * @return [type] [description]
	 */
	public function file()
	{
		$file = Article::getAllArticle();
		return view('index.file.index',compact('file'));
	}
	/**
	 * 留言
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function message(Request $request)
	{
		$validator = Validator::make($request->input(),[
            'name'     => 'required',
            'content' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // 存储评论
        $data = [
        	'name'    => $request->input('name'),
        	'email'    => $request->input('email',''),
        	'url'    => $request->input('url',''),
        	'content' => strip_tags($request->input('content'),"<p><a>"),
        	'pid'     => $request->input('pid'),
        	'status'  => 1,
        	'ip'      => $request->getClientIp(),
        ];
        Cache::forever('name', $request->input('name'));
        Cache::forever('email', $request->input('email'));
        $id = Message::create($data);
        if(!$id){
        	return redirect()->back()->with('success', '服务器错误')->withInput();
        }
        return redirect()->back()->with('success', '评论成功');
    }
    /**
     * 标签搜索文章
     * @param  string $tagid [description]
     * @return [type]        [description]
     */
    public function tagArticleList($tagid='')
    {
    	if(empty($tagid)){
			return redirect('/');
    	}
    	$article_ids = DB::select('SELECT `article_id` FROM article_tags WHERE FIND_IN_SET(:tagid,tag_id)', ['tagid' => $tagid]);
    	$ids = array_column($article_ids,'article_id');
    	if(empty($ids)){
			return redirect('/');
    	}
    	$article = Article::with(['user'])->whereIn('id',$ids)->orderBy('created_at','desc')->simplePaginate(3);
    	return view('index.home.index',compact('article'));
    }
    public function friend()
    {
    	return view('index.friend.index');
    }
}