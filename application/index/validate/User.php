<?php
namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'user_name'  =>  'require|min:3|unique:user',
        'user_pwd' =>'require|min:6|max:18'
    ];


    protected $message = [
    	'user_name.min' =>'用户名长度必须大于3位',
    	'user_pwd.min' =>'密码必须大于6位',
    	'user_name.unique' =>'用户名已经存在！',
    	'user_pwd.max'=>'密码必须小于18位',
    ];

}
?>