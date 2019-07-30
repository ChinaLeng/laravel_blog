<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;//图片上传类

class BaseController extends Controller
{
	/**
	 * 图片上传
	 * @param Request            $request  [description]
	 * @param ImageUploadHandler $uploader [description]
	 */
	public function UpImg(Request $request,ImageUploadHandler $uploader)
	{
		// 初始化返回数据，默认是失败的
        $data = [
            'success' => false,
            'msg' => '上传失败!',
            'file_path' => ''
        ];
		if($request->hasFile('file')){
			$uploader = $uploader->save($request->file('file'), 'editor', 1);
			$data = [
	            'success' => true,
	            'msg' => '上传成功!',
	            'file_path' => $uploader['path'],
        	];
		}
		return json_encode($data);
	}
}