<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
	public function success($data=null, $msg=null)
    {
        return response()->horesp(0, $data, $msg);
    }

    public function error($data=null, $msg=null)
    {
        return response()->horesp(1, $data, $msg);
    }
}