<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class MiniweiboAction extends RAF_Action {
	var $access;
	var $db;
	
	/*
	 * 默认加载方法
	 */
	public function MiniweiboAction(){
		$access	=	load_class('Access')->checkLogin();
		if (!$access){
			redirect($GLOBALS['admin_root'].'index.php?action=login');
		}
		if ($access['accessid'] != '3' && $access['accessid'] != '0'){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');
		}
		$this->db	=  DB::factory();
	}
	
	public function index() {
		$_SESSION['request_url']=request_uri();
		$type	=	$this->doGet('type','1');	
		$wbinfo	=	$this->db->getAll("SELECT * FROM chn_weibo WHERE type = ".$type);
		include 'view/weibolist.php';
	}
	
	public function edit() {
		$found = true;
	    $id	=	$this->doGet('id','1');	
	    $wbinfo	=	$this->db->getOneRow('chn_weibo','id = '.$id,'id DESC');	
	    include 'view/weiboedit.php';
	
	}
	
    public function add() {	
    	$found = false;
    	$type  = $this->doGet('type','1');	
	    include 'view/weiboedit.php';	
	}
	
    public function del() {	    	
    	$id     = $this->doGet('id');	
    	$result = $this->db->delete('chn_weibo','id = '.$id);
	    if ($result){
				alert('删除成功!',$_SESSION['request_url'],1);
		}else{
				alert('删除失败!',$_SESSION['request_url'],1);
		} 			
	}
	
	
    public function actget() {
	    $gets	=	$this->doGet();	   
	    if($gets['act'] == 'edit'){ //修改
	        $result = $this->db->update('chn_weibo',array('name'=>iconv('utf-8', 'gbk', $gets['name']),'uid'=>$gets['uid']),'id = '.$gets['id']);
		    if ($result){
				alert('修改成功!',$_SESSION['request_url'],1);
			}else{
				alert('修改失败!',$_SESSION['request_url'],1);
			}    
	    }else{
	        $result = $this->db->insert('chn_weibo',array('type'=>$gets['type'],'name'=>iconv('utf-8', 'gbk', $gets['name']),'uid'=>$gets['uid']));
		    if ($result){
				alert('添加成功!',$_SESSION['request_url'],1);
			}else{
				alert('添加失败!',$_SESSION['request_url'],1);
			}     
	    }
	}
	
}