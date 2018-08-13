<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
		$this->display();
    }
	public function login(){//登陆
		$model=M('uinfomation');
		$data['UserName']  = I('UserName');

		$sele=$model->where($data)->find();
		//echo I('Password');
		//var_dump($sele) ;
		if($sele['password'] ===I('Password')){
			session('username',$data['UserName']);
			$res =$model->where($data)->select();
            session('uid',$res[0]['userid']);
           //  echo $res[0]['userid'];
			$this->success('登陆成功',U('Home/Index/index'),0);
			
		}else{
			
			$this->error('账号或密码错误',U('Home/Login/index'),0);
		}
		
	}
	public function login_out(){
		if(!session('username')){
			$this->error('请登陆',U('Home/Login/index'),1);
		}
		session_destroy();
		$this->success('退出登陆成功',U('Home/Login/index'));
	}
	
	public function register(){
		$this->display();
	}
	
	public function doRegister(){
		$u=M('uinfomation');
		$_POST['Name']='用户'.time();
		$_POST['sex']="2";
		if($u->add($_POST)){
			$this->success('注册成功',U('Home/Login/index'),1);
		}
	}
}