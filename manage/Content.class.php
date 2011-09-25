<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class ContentAction extends RAF_Action {
	var $access;
	var $lantype;
	/*
	 * 默认加载方法
	 */
	public function ContentAction(){
		$this->access	=	load_class('Access')->checkLogin();
		if (!$this->access){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');
		}
	}
	
	public function index() {
		
		$msg	=	$GLOBALS['msg']['manage'];
		$_SESSION['request_url']=request_uri();
		
		$db	=	DB::factory();
		
		$where	=	"1 = 1";
		$sctitle	=	$this->doGet('title','');
		if (!empty($sctitle)){
			$where	.=	" AND title like '%".cstr($sctitle,'utf8','gbk')."%'";
		}
		$sctype	=	$this->doGet('type','');
		if (!empty($sctype)){
			$where	.=	" AND type like '%".cstr($sctype,'utf8','gbk')."%'";
		}
		$pageNum	=	20;
		$pageConfig	=	array(
			'first'	=>	$msg['first'],
			'prev'	=>	$msg['prev'],
			'next'	=>	$msg['next'],
			'last'	=>	$msg['last'],
			'jump'	=>	$msg['jump'],
			'page'	=>	$msg['page'],
		);
		$db->setPage($pageNum,$pageConfig);
		
		$newslist	=	$db->getAllRow("chn_chncup",$where,"chncup_id desc");
		$pagehtml	=	$db->page_html;
				
		include 'view/contentlist.php';
	}
	
	public function edit(){		
		
		$msg	=	$GLOBALS['msg']['manage'];
		
		$id		=	$this->doGet('id','');
		if (empty($id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		$db	=	DB::factory();
		
		$news	=	$db->getOneRow("chn_chncup","chncup_id = '".$id."'");
		include 'view/contentedit.php';
	}
	
	public function editsure(){
		$msg	=	$GLOBALS['msg']['alert'];
		
		$news_id		=	$this->doGet('id','');
		if (empty($news_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		
		$post	=	$this->doPost();
		$post['content']	=	$_POST['content'];
		unset($post['submit']);
		
		if (empty($post['content'])){
			alert($msg['nocontent']);
		}
		//$path = $GLOBALS['upload_doc']; 	
	   //$file = $_FILES['imgfile']; 
	   //$up	=	new Upload($path, $file);
	   //$fresult = $up->doup();	   
	   	
		//$data	=	array(
	   		//'link'			=>	$up->filename,
		//);
		//$data	=	array_merge($data,$post);
		$db	=	DB::factory();
		$res	=	$db->update('chn_chncup',$post,"chncup_id='".$news_id."'");
		if ($res){
			alert($msg['editsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['editfail'],$_SESSION['request_url'],1);
		}
		
	}
}