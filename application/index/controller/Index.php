<?php
namespace app\index\controller;

class Index extends \think\Controller
{
    public function index()
    {
        return ;
    }

    // 去到首页的行为action
    public function home()
    {
    	// 这一段代码就可以让程序从控制器跳转到视图
    	return $this->fetch();
    }
}
