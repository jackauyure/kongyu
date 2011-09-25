<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class NewsAction extends RAF_Action {
	var $access;
	var $catetype;
	var $lantype;
	var $allow;
	/*
	 * 默认加载方法
	 */
	public function NewsAction(){
		$this->catetype	=	$this->doGet('catetype','2');
		
		/*
		 * 'type','title','tiny','shorttitle','keyword','order','newsdate','show','content','toindex','tofocus','upload','link'
		 */
		$this->allow	=	array(
			'1'	=>	array('type','title','order','show','upload','link'),
			'2'	=>	array('type','order','show','upload'),
			'6'	=>	array('type','title','order','show','content','upload'),
			'9'	=>	array('type','title','newsdate','show','content'),
			'11'	=>	array('type','title','show','upload'),
			'12'	=>	array('type','title','show','link'),
		);
		
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
			$adminlist[$tmp['user_id']]	=	$tmp['user_name'];
		}
		$row	=	$db->getAllRow("chn_category","show_flag = '1'","show_order desc");
		if (!empty($row)) foreach ($row as $tmp){
			$categorylist[$tmp['category_id']]	=	$tmp['category_name'];
		}
		
		$where	=	"1=1";
		$sctitle	=	$this->doGet('title','');
		if (!empty($sctitle)){
			$where	.=	" AND title like '%".$sctitle."%'";
		}
		$sccategory	=	$this->doGet('category_id','');
		if (!empty($sccategory)){
			$where	.=	" AND category_id = '".$sccategory."'";
		}
		$lan_type	=	$this->doGet('lan_type','');
		if ($lan_type != ''){
			$where	.=	" AND lan_type = '".$lan_type."'";
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
		
		$newslist	=	$db->getAllRow("chn_news",$where,"news_date desc");
		$pagehtml	=	$db->page_html;
				
		include 'view/newslist.php';
	}
	
	public function add(){		
		$msg	=	$GLOBALS['msg']['manage'];
		
		$allow	=	isset($this->allow[$this->catetype])?$this->allow[$this->catetype]:array();
		
		$db	=	DB::factory();
		$row	=	$db->getAllRow("chn_users");
		if (!empty($row)) foreach ($row as $tmp){
			$adminlist[$tmp['user_id']]	=	$tmp['user_name'];
		}
		$row	=	$db->getAllRow("chn_category","show_flag = '1'","show_order desc");
		if (!empty($row)) foreach ($row as $tmp){
			$categorylist[$tmp['category_id']]	=	$tmp['category_name'];
		}
		include 'view/newsadd.php';
	}
	
	public function addsure(){
		$msg	=	$GLOBALS['msg']['alert'];
		
		$allow	=	isset($this->allow[$this->catetype])?$this->allow[$this->catetype]:array();
		
		$post	=	$this->doPost();
		if (isset($post['content'])){
			$post['content']	=	$_POST['content'];
		}
		unset($post['submit']);
		
		/*
		 * 'type','title','tiny','shorttitle','keyword','order','newsdate','show','content','toindex','tofocus','upload'
		 */
		if (in_array('title', $allow) && empty($post['title'])){
			alert($msg['notitle']);
		}
		if (in_array('tiny', $allow) && empty($post['tiny_title'])){
			alert($msg['notiny']);
		}
		if (in_array('shorttitle', $allow) && empty($post['short_title'])){
			alert($msg['noshort']);
		}
		if (in_array('keyword', $allow) && empty($post['key_word'])){
			alert($msg['nokey']);
		}
		if (in_array('newsdate', $allow) && empty($post['news_date'])){
			alert($msg['nodate']);
		}
		if (in_array('content', $allow) && empty($post['content'])){
			alert($msg['nocontent']);
		}
		$fileUrl	=	'';
		if (!empty($_FILES['imgfile'])){
			$path = $GLOBALS['upload_images']; 	
		   	$file = $_FILES['imgfile']; 
		   	$up	=	new Upload($path, $file);
		   	$fresult = $up->doup();
		   	$fileUrl	=	$up->filename;
		}
	   	
		$data	=	array(
			'lan_type'			=>	$GLOBALS['lantype'],
			'team_img' 			=> 	$fileUrl,
		);
		$data	=	array_merge($data,$post);
		$db	=	DB::factory();
		$res	=	$db->insert('chn_news',$data);
		if ($res){
			alert($msg['addsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['addfail'],$_SESSION['request_url'],1);
		}
		
	}
	
	public function edit(){		
		
		$msg	=	$GLOBALS['msg']['manage'];
		
		$allow	=	isset($this->allow[$this->catetype])?$this->allow[$this->catetype]:array();
		
		$news_id		=	$this->doGet('id','');
		if (empty($news_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		$db	=	DB::factory();
		$row	=	$db->getAllRow("chn_users");
		if (!empty($row)) foreach ($row as $tmp){
			$adminlist[$tmp['user_id']]	=	$tmp['user_name'];
		}
		$row	=	$db->getAllRow("chn_category","show_flag = '1'","show_order desc");
		if (!empty($row)) foreach ($row as $tmp){
			$categorylist[$tmp['category_id']]	=	$tmp['category_name'];
		}
		
		$news	=	$db->getOneRow("chn_news","news_id = '".$news_id."'");
		include 'view/newsedit.php';
	}
	
	public function editsure(){
		$msg	=	$GLOBALS['msg']['alert'];
		
		$news_id		=	$this->doGet('id','');
		if (empty($news_id)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		
		$post	=	$this->doPost();
		if(isset($post['content'])){
			$post['content']	=	$_POST['content'];
		}
		unset($post['submit']);
	     
		$allow	=	isset($this->allow[$this->catetype])?$this->allow[$this->catetype]:array();
		/*
		 * 'type','title','tiny','shorttitle','keyword','order','newsdate','show','content','toindex','tofocus','upload'
		 */
		if (in_array('title', $allow) && empty($post['title'])){
			alert($msg['notitle']);
		}
		if (in_array('tiny', $allow) && empty($post['tiny_title'])){
			alert($msg['notiny']);
		}
		if (in_array('shorttitle', $allow) && empty($post['short_title'])){
			alert($msg['noshort']);
		}
		if (in_array('keyword', $allow) && empty($post['key_word'])){
			alert($msg['nokey']);
		}
		if (in_array('newsdate', $allow) && empty($post['news_date'])){
			alert($msg['nodate']);
		}
		if (in_array('content', $allow) && empty($post['content'])){
			alert($msg['nocontent']);
		}
		$fileUrl	=	'';
		if (!empty($_FILES['imgfile'])){
			$path = $GLOBALS['upload_images']; 	
		   	$file = $_FILES['imgfile']; 
		   	$up	=	new Upload($path, $file);
		   	$fresult = $up->doup();
		   	$fileUrl	=	$up->filename;
		}
		$data	=	array(
			'team_img' 		    => 	$fileUrl,
		);
		$data	=	array_merge($data,$post);
		$db	=	DB::factory();
		$res	=	$db->update('chn_news',$data,"news_id='".$news_id."'");
		if ($res){
			alert($msg['editsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['editfail'],$_SESSION['request_url'],1);
		}
		
	}
	
	public function del(){
		$msg	=	$GLOBALS['msg']['alert'];
		
		$temp1		=	$this->doGet('id','');
		$idlist		=	$this->doPost('id',array());
		if (!empty($temp1)){
			array_push($idlist,$temp1);
		}
		if (empty($idlist)){
			alert($msg['noid'],$_SESSION['request_url']);
		}
		$where	=	"news_id in (".implode(",",$idlist).")";
		$db	=	DB::factory();
		$res	=	$db->delete('chn_news',$where);
		if ($res){
			alert($msg['delsuc'],$_SESSION['request_url'],1);
		}else{
			alert($msg['delfail'],$_SESSION['request_url'],1);
		}
	}
}