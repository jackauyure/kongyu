<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class MinisiteAction extends RAF_Action {
	var $access;
	
	/*
	 * 默认加载方法
	 */
	public function MinisiteAction(){
		$access	=	load_class('Access')->checkLogin();
		if (!$access){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');
		}elseif ($access['accessid'] != '3' && $access['accessid'] != '0'){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');			
		}
	}
	
	public function index() {
		$_SESSION['request_url']=request_uri();
		
		$db	=	DB::factory();
		$data	=	$db->getOneRow('chn_config');
		if (!empty($data)) foreach ($data as $k=>$v){
			$config[$k]	=	(!empty($v))?cstr($v):'';
		}
		include 'view/miniconfig.php';
	}
	
	public function setconfig() {
		$post	=	$_POST;
		unset($post['submit']);
		if (!empty($post)) foreach ($post as $k=>$v){
			$data[$k]	=	(!empty($v))?cstr($v,'utf8','gbk'):'';
		}
		//dump($data,1);
		$db	=	DB::factory();
		$res	=	$db->update('chn_config',$data,"id=1");
		if ($res){
			alert('编辑成功!',$_SESSION['request_url'],1);
		}else{
			alert('编辑失败!',$_SESSION['request_url'],1);
		}
	}
}