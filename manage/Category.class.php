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
		
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND category_type = '".$this->catetype."'";
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
		toStr($post);
		
		if (empty($post['category_name'])){
			alert($msg['noname']);
		}
		$data	=	array(
			'create_date'		=>	date('Y-m-d H:i:s'),
			'create_user_id'	=>	$this->access['accessid'],
			'lan_type'			=>	$GLOBALS['lantype'],
			'category_type' 	=> 	$this->catetype,
		);
		$data	=	array_merge($data,$post);
		$db	=	DB::factory();
		$res	=	$db->insert('chn_category',$data);
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
		fromStr($cate);		
		include 'view/cateedit.php';
	}
	
	public function editsure() {
		
		$msg	=	$GLOBALS['msg']['alert'];
	
		$cate_id		=	$this->doGet('id','');
		if (empty($cate_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		
		$post	=	$this->doPost();
		toStr($post);
		
		if (empty($post['category_name'])){
			alert($msg['noname']);
		}
		$data	=	array(
			'update_date'		=>	date('Y-m-d H:i:s'),
			'update_user_id'	=>	$this->access['accessid'],
		);
		$data	=	array_merge($data,$post);
		$db	=	DB::factory();
		$res	=	$db->update('chn_category',$data,"category_id = '".$cate_id."'");
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