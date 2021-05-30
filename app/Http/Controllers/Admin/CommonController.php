<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class CommonController extends Controller{

    /**
     * api数据返回封装 
     * @param int $code  状态码 200执行成功 201参数传递错误 202执行出错 203暂无数据
     * @param string $msg 提示语
     * @param array|null $content  返回数据
     */
    public function returnApi($code,$msg,$content = null){
        return json_encode([
            'code' => $code,
            'msg' => $msg,
            'content' => $content
        ],JSON_UNESCAPED_UNICODE);
    }
}