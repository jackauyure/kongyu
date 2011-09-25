<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class AppAction extends RAF_Action {
	var $access;
	/*
	 * 默认加载方法
	 */
	public function AppAction(){
		$this->access	=	load_class('Access')->checkLogin();
		if (!$this->access){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');
		}
	}
	
	public function index() {
		include 'view/index.php';
	}
	
	public function left() {
		$msg	=	$GLOBALS['msg']['left'];
		include 'view/left.php';
	}
	
	public function top(){
		include 'view/top.php';
	}
	
	public function main(){
		redirect('index.php?action=content');
	}
}