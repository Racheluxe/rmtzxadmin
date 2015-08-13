<?php
class IndexAction extends Action 
{
	public function index()
	{
		$this->show();
	}

	public function view()
	{
		//view操作方法逻辑的实现
		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->redirect('Index/index');
		}

		$view_user = M('freshman');
		$view_list = $view_user->select();
		for ($i=0; $i <count($view_list) ; $i++) { 
			switch ($view_list[$i]['accepted']) {
			case 0:
				$view_list[$i]['status'] = '未录取';
				break;
			case 1:
				$view_list[$i]['status'] = '已录取';
				break;
			default:
				$view_list[$i]['status'] = '未知';
				break;
		}
		}
		
		$this->assign('view_list',$view_list);
		$this->display();//输出页面模板
	}

	public function handleLogin()
	{
		if (!IS_AJAX) {
			$this->error('非法操作！',U('Index/index'));
		}

		$data = M('admin');
		$password = $data->where('name="'.I('POST.name').'"')->getField('password');
		if ((password_verify(I('POST.password'),$password)))//need PHP 5.5+
		{
			session('loggeduser',I('POST.name'));
			//$this->redirect('Index/view');
			$this->ajaxReturn(array('status' => 0));//success
		}
		else
		{
			// $this->error('用户名或密码错误！', U('Index/index'));
			$this->ajaxReturn(array('status' => 1));//fail
		}

	}

	public function logout()
	{
		session('loggeduser',null);
		$this->redirect('Index/index');
	}

	public function edit()
	{
		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}
		$members = M('freshman'); 
		$member = $members->where('id='.$_GET['id'])->find();
		
		$id = $members->id;$this->assign('id',$id);
		$name = $members->name;$this->assign('name',$name);
		$award = $members->award;$this->assign('award',$award);
		$exp = $members->exp;$this->assign('exp',$exp);
		$reason = $members->reason;$this->assign('reason',$reason);
		$this->show();

	}

	public function delete()//ajax handler
	{
		if (!IS_AJAX) {
			$this->error('非法操作！',U('Index/index'));
		}

		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}

		$id = (int)$_POST['id'];
		$members = M("freshman"); 
		if ($members->where('id='.$id)->delete())//删记录
		{
			$this->ajaxReturn(array('status' => 0));//success
		}
		else
		{
			$this->ajaxReturn(array('status' => 1));//fail
		}

		
	}



	public function handleEdit()
	{
		if (!IS_POST) {
			$this->error('非法操作！',U('Index/index'));
		}

		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}

		$_POST['accepted'] = 1;

		$member = M('freshman'); // 实例化member对象

		$accep=$member->where('id='.$_POST['id'])->Field('accepted')->find();
		$acc=$accep['accepted'];
		if($acc==1){
			$this->success('已经录取了！','__PUBLIC__/clsWin.html?id='.rand());//莫名其妙的缓存问题……
		}
			else{$member->where('id='.$_POST['id'])->save($_POST); // 写入用户数据到数据库
		$this->success('录取成功！','__PUBLIC__/clsWin.html?id='.rand());
		}//莫名其妙的缓存问题……
	}
}
