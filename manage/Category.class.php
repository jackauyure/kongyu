<?php 

class CategoryAction extends RAF_Action {
	var $access;
	var $catetype;
	var $lantype;
	/*
	 * 默认加载方法
	 */
	public function CategoryAction(){
		$this->catetype	=	$this->doGet('catetype','2');
		$this->access	=	load_class('Access')->checkLogin();
		if (!$this->access){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');
		}
	}
	
	public function index() {
		$msg	=	$GLOBALS['msg']['manage'];
		$_SESSION['request_url']=request_uri();
		
		$db	=	DB::factory();		
	    $row	=	$db->getAllRow("chn_users");
		if (!empty($row)) foreach ($row as $tmp){
			$adminlist[$tmp['user_id']]	=	cstr($tmp['user_name']);
		}
		
		$where	=	"1 = 1";
		$order	=	"show_order desc";
		$catinfo	=	$db->getAllRow("chn_category",$where,$order);
		
		include 'view/category.php';
	}
	
	public function add() {
		$msg	=	$GLOBALS['msg']['manage'];
		include 'view/cateadd.php';
	}
	
	public function addsure() {
		
		$msg	=	$GLOBALS['msg']['alert'];
		
		$post	=	$this->doPost();
		
		if (empty($post['category_name'])){
			alert($msg['noname']);
		}
		$db	=	DB::factory();
		$res	=	$db->insert('chn_category',$post);
		if ($res){
			alert($msg['addsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['addfail'],$_SESSION['request_url'],1);
		}
	}
	
	public function edit() {
		$msg	=	$GLOBALS['msg']['manage'];
		$cate_id		=	$this->doGet('id','');
		if (empty($cate_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		
		$db	=	DB::factory();
		$cate	=	$db->getOneRow("chn_category","category_id = '".$cate_id."'");
		include 'view/cateedit.php';
	}
	
	public function editsure() {
		
		$msg	=	$GLOBALS['msg']['alert'];
	
		$cate_id		=	$this->doGet('id','');
		if (empty($cate_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		
		$post	=	$this->doPost();
		
		if (empty($post['category_name'])){
			alert($msg['noname']);
		}
		$db	=	DB::factory();
		$res	=	$db->update('chn_category',$post,"category_id = '".$cate_id."'");
		if ($res){
			alert($msg['editsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['editfail'],$_SESSION['request_url'],1);
		}
	}
	
	public function del(){
	
		$msg	=	$GLOBALS['msg']['alert'];
		$cate_id		=	$this->doGet('id','');
		if (empty($cate_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		$db	=	DB::factory();
		$res	=	$db->delete('chn_category',"category_id = '".$cate_id."'");
		if ($res){
			alert($msg['delsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['delfail'],$_SESSION['request_url'],1);
		}
	}
}

?>