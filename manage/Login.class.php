<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class LoginAction extends RAF_Action {
	var $access;
	var $loginUrl;
	
	/*
	 * 默认加载方法
	 */
	public function LoginAction(){
		$this->access	=	load_class('Access')->checkLogin();
		$this->loginUrl	=	$GLOBALS['admin_root'].'index.php?action=login';
	}

	public function index() {		
		if ($this->access){
			redirect($GLOBALS['admin_root'],'top');
		}
		include 'view/login.php';
	}
	public function dologin() {
		//$this->doPost('username',0)
		$post	=	$this->doPost();
		if (empty($post['username'])){
			alert('用户名不能为空!',$this->loginUrl);
		}
		if (empty($post['password'])){
			alert('密码不能为空!',$this->loginUrl);
		}
		if ($post['checkcode'] != $_SESSION['pwdt']){
			alert('验证码不对!',$this->loginUrl);
		}
		$db	=	DB::factory();
		$password	=	$db->getOneField("chn_users","password","user_name = '".$post['username']."' AND state = 1");
		if (empty($password)){
			alert('用户不存在!',$this->loginUrl);
		}
		if (raf_password($post['password']) !== $password){
			alert('密码错误!',$this->loginUrl);
		}
		$_SESSION['username']	=	$post['username'];
		redirect($GLOBALS['admin_root']);
	}
	public function loginout(){
		unset($_SESSION['username']);
		redirect($this->loginUrl,'top');
	}
}