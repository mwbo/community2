<?php
namespace app\admin\controller;
/**
* 		
*/
class News extends \think\Controller
{
	
	public function index()
	{
		// 列表
		// 查询
		$list = db('news')->select();

		// 把一个变量赋值给模版
		// 第一个参数：模版变量
		// 第二个参数：值
		$this->assign('news_list',$list);
		return $this->fetch();
	}

	public function add()
	{
		// 进入添加界面
		return $this->fetch();
	}

	public function save()
	{
		$add_data = input();
		 $files = request()->file('news_thumb');
		 // print_r($files);exit();
		 if ($files) {
		 	$file_info = $files->move('uploads');
		 	$add_data['news_thumb'] = $file_info->getSaveName();
		 }

		 $add_data['create_time'] = time();
		db('news')->insert($add_data);
	
		$this->success('添加成功，哎哟不错！','index');

	}
}
?>