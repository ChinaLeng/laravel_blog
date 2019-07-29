<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CommentController extends BaseController
{
	public function index()
	{
		return view('admin.comment.index');
	}
}