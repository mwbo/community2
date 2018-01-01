<?php
namespace app\index\controller;
use \think\captcha\Captcha;
use \think\Session;
// 引入一个文件

class User extends \think\Controller
{
    public function reg()
    {
        return $this->fetch();
    }

    public function doReg()
    {
        $save_data = input();
        // 进行验证码校验
        $captcha = new Captcha();
        if (!$captcha->check(input('yzm'))) {
            $this->error('验证码输入不正确！');
            exit();
        }
        unset($save_data['yzm']);

        // 在后台程序还需校验非空、校验字段合法性
        
        $user_vali = validate('user');
        // !非false
        if (!$user_vali->check($save_data)) {
            $this->error($user_vali->getError());
        }
        $save_data['create_time'] = time();

        // 键释放掉
        unset($save_data['user_repwd']);
        unset($save_data['yzm']);

        db('user')->insert($save_data);
        $this->success('注册成功','user/login');
    }

    // 去到首页的行为action
    public function login()
    {
    	// 这一段代码就可以让程序从控制器跳转到视图
    	return $this->fetch();
    }
    public function doLogin()
    {
        // 处理登录
        //获取用户名和密码
        $user_name  = input('user_name');
        $user_pwd  = input('user_pwd');
        //查询用户表有没有这些信息的用户
       $info =  db('user')->where("user_name='$user_name' and user_pwd='$user_pwd'")->find();
        if (empty($info)) {
            $this->error('用户名或密码不正确！');
        }else{
            Session::set('uinfo',$info);
            $this->success('你回来了！就好！');

        }
    }

    public function logout()
    {
            Session::delete('uinfo');
            $this->success('我还会回来的。');

        
    }
}
