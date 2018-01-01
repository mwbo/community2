<?php
namespace app\index\controller;

class Lanmu extends \think\Controller
{
    public function mianshi()
    {
        return $this->fetch();
    }

    // 去到职场的行为action
    public function zhichang()
    {
    	// 这一段代码就可以让程序从控制器跳转到视图
    	return $this->fetch();
    }
}
