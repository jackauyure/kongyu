<?php

class PicsAction extends RAF_Action {
	var $access;
	var $db;
	
	/*
	 * 默认加载方法
	 */
	public function PicsAction(){
		$access	=	load_class('Access')->checkLogin();
		if (!$access){
			redirect($GLOBALS['admin_root'].'index.php?action=login');
		}	
		$this->db	=  DB::factory();
	}
	
   public function index() {
   	    $msg	=	$GLOBALS['msg']['manage'];
		$_SESSION['request_url']=request_uri();
		$sorts  = $this->db->getAll("SELECT * FROM chn_category WHERE show_flag = '1' AND lan_type = '".$GLOBALS['lantype']."' AND category_type = 3 ORDER BY category_id ASC");
        $st = array();
		foreach ($sorts as $s){
			$st[$s['category_id']] = $s;
		}	
		$sort   =   $this->doGet('sort');		
		$where	=	"WHERE lan_type = '".$GLOBALS['lantype']."'";
		if(!empty($sort)){
			$where .= ' AND category_id = '.$sort;
		}
		$pageNum	=	10;
		$pageConfig	=	array(
			'first'	=>	$msg['first'],
			'prev'	=>	$msg['prev'],
			'next'	=>	$msg['next'],
			'last'	=>	$msg['last'],
			'jump'	=>	$msg['jump'],
			'page'	=>	$msg['page'],
		);
		$this->db->setPage($pageNum,$pageConfig);
		$imglist	=	$this->db->getAll("SELECT * FROM chn_img ".$where);	
		$pagehtml	=	$this->db->page_html;
		include 'view/piclist.php';
   }
   
   public function edit() {
   	    $_SESSION['request_url']=request_uri();
   	    $id	=	$this->doGet('id');	
        $sorts  = $this->db->getAll("SELECT * FROM chn_category WHERE category_type =3 AND lan_type = '".$GLOBALS['lantype']."' ORDER BY category_id ASC");
        $st = array();
		foreach ($sorts as $s){
			$st[$s['category_id']] = $s;
		}
		$found = true;
	    $imginfo	=	$this->db->getOneRow('chn_img','img_id = '.$id,'img_id DESC');	
	    include 'view/picedit.php';
	
	}
	
    public function add() {	
    	$_SESSION['request_url']=request_uri();
    	$sorts  = $this->db->getAll("SELECT * FROM chn_category WHERE category_type =3 AND lan_type = '".$GLOBALS['lantype']."' ORDER BY category_id ASC");
        $st = array();
		foreach ($sorts as $s){
			$st[$s['category_id']] = $s;
		}
    	$found = false;
    	$sort  = $this->doGet('sort');
	    include 'view/picedit.php';	
	}
	
    public function del() {	    	
    	$id     = $this->doGet('id');	
    	$delrow = $this->db->getOneRow('chn_img','img_id = '.$id);
    	$result = $this->db->delete('chn_img','img_id = '.$id);
	    if ($result){ //删除文件
	    	    file_exists($GLOBALS['upload_images'].$delrow['big_pic']) && @unlink($GLOBALS['upload_images'].$delrow['big_pic']);
	    	    file_exists($GLOBALS['upload_images'].$delrow['small_pic']) && @unlink($GLOBALS['upload_images'].$delrow['small_pic']);
				alert('删除成功!',$_SESSION['request_url'],1);
		}else{
				alert('删除失败!',$_SESSION['request_url'],1);
		} 			
	}
	
    public function actpost() {   	
	    $posts	=	$this->doPost();	 
        if(empty($posts['category_id'])){
    		alert('分类不能为空!',$_SESSION['request_url'],1);
    	}
        if(empty($posts['img_title'])){
    		alert('标题不能为空!',$_SESSION['request_url'],1);
    	}
    		    	    
	   	$path = $GLOBALS['upload_images']; 	
	   	$file = $_FILES['imgfile']; 
	   	$up	=	new Upload($path, $file);
	   	$fresult = $up->doup();	   	 	  	   	   			   	  	     		   
	    if($posts['act'] == 'edit'){ // 修改             		    		    		    		    	      	    		    		    	
	    	$result =  $this->db->update('chn_img',
	    	array(
	    	   'img_title'    => iconv('utf-8', 'gbk', $posts['img_title']),
	    	   'category_id'  => $posts['category_id'],
	    	   'big_pic'      => $up->filename  != '' ? $up->filename : $posts['big_pic'],
	    	   'small_pic'    => $up->s_filename != '' ? $up->s_filename : $posts['small_pic'],
	    	   'img_desc'     => iconv('utf-8', 'gbk', $posts['img_desc']),
	    	   'img_date'     => $posts['img_date'],
	    	   'lan_type'     => $GLOBALS['lantype'],
	    	   'index_flag'   => $posts['index_flag'],
	    	   'show_flag'    => $posts['show_flag']
	    	),
	    	   'img_id = '.$posts['img_id']
	    	);      			
	        if ($result){
	        	if($up->filename != '' && strlen($posts['big_pic'])>10){
	        	   file_exists($path.$posts['big_pic']) && @unlink($path.$posts['big_pic']);
	        	}
	            if($up->s_filename != '' && strlen($posts['small_pic'])>10){
	        	   file_exists($path.$posts['small_pic']) && @unlink($path.$posts['small_pic']);
	        	}
				alert('修改成功!',$_SESSION['request_url'],1);
			}else{
				alert('修改失败!',$_SESSION['request_url'],1);
			}    
	    }else{                     //   增加	        	    
	    	$result = $this->db->insert('chn_img',
	    	array(
	    	   'img_title'    => iconv('utf-8', 'gbk', $posts['img_title']),
	    	   'category_id'  => $posts['category_id'],
	    	   'big_pic'      => $up->filename,
	    	   'small_pic'    => $up->s_filename, 
	    	   'img_desc'     => iconv('utf-8', 'gbk', $posts['img_desc']),
	    	   'img_date'     => $posts['img_date'],
	    	   'lan_type'     => $GLOBALS['lantype'],
	    	   'index_flag'   => $posts['index_flag'],
	    	   'show_flag'    => $posts['show_flag']
	    	));	    
	        if ($result){
				alert('添加成功!',$_SESSION['request_url'],1);
			}else{
				alert('添加失败!',$_SESSION['request_url'],1);
			}     
	    }
	    
	}	
}	
?>	