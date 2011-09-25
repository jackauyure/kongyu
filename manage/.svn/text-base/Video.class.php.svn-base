<?php
class VideoAction extends RAF_Action {
	var $access;
	var $catetype;
	var $lantype;
	/*
	 * 默认加载方法
	 */
	public function VideoAction(){
		$this->catetype	=	$this->doGet('catetype','4');
		$this->access	=	load_class('Access')->checkLogin();
		if (!$this->access){
			redirect($GLOBALS['admin_root'].'index.php?action=login','top');
		}
	}
	
    public function index() {
		$msg	=	$GLOBALS['msg']['manage'];
		$_SESSION['request_url']=request_uri();
		$sccategory = $this->doGet('category_id');
		
		$db	=	DB::factory();
		$row	=	$db->getAllRow("chn_users");
		if (!empty($row)) foreach ($row as $tmp){
			$adminlist[$tmp['user_id']]	=	cstr($tmp['user_name']);
		}
		$row	=	$db->getAllRow("chn_category","show_flag = '1' AND lan_type = '".$GLOBALS['lantype']."' AND category_type = '".$this->catetype."'","show_order desc");
		if (!empty($row)) foreach ($row as $tmp){
			$categorylist[$tmp['category_id']]	=	cstr($tmp['category_name']);
		}		
		$where	=	"lan_type = '".$GLOBALS['lantype']."'";
		
		if(!empty($sccategory)){
		    $where .= ' AND category_id = '.$sccategory;
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
		
		$videolist	=	$db->getAllRow("chn_video",$where,"video_id desc");
		$pagehtml	=	$db->page_html;
				
		include 'view/videolist.php';
	}
	
    public function add(){		
		$msg	=	$GLOBALS['msg']['manage'];
		
		$db	=	DB::factory();
		$row	=	$db->getAllRow("chn_users");
		if (!empty($row)) foreach ($row as $tmp){
			$adminlist[$tmp['user_id']]	=	cstr($tmp['user_name']);
		}
		$row	=	$db->getAllRow("chn_category","show_flag = '1' AND lan_type = '".$GLOBALS['lantype']."' AND category_type = '".$this->catetype."'","show_order desc");
		if (!empty($row)) foreach ($row as $tmp){
			$categorylist[$tmp['category_id']]	=	cstr($tmp['category_name']);
		}
		$found = false;
		include 'view/videoedit.php';
	}
	
    public function edit(){		
		$msg	=	$GLOBALS['msg']['manage'];	
		$db	=	DB::factory();
		$row	=	$db->getAllRow("chn_users");
		if (!empty($row)) foreach ($row as $tmp){
			$adminlist[$tmp['user_id']]	=	cstr($tmp['user_name']);
		}
		$row	=	$db->getAllRow("chn_category","show_flag = '1' AND lan_type = '".$GLOBALS['lantype']."' AND category_type = '".$this->catetype."'","show_order desc");
		if (!empty($row)) foreach ($row as $tmp){
			$categorylist[$tmp['category_id']]	= cstr($tmp['category_name']);
		}
	    $videoinfo	=	$db->getOneRow('chn_video','video_id = '.$this->doGet('id'),'video_id DESC');
	    $found      = true;	
		include 'view/videoedit.php';
	}
		
	public function del(){
		$temp1		=	$this->doGet('id','');
		$idlist		=	$this->doPost('video_id',array());
		if (!empty($temp1)){
			array_push($idlist,$temp1);
		}
		$where	=	"video_id in (".implode(",",$idlist).")";
		$db	=	DB::factory();
		$delrows  = $db->getAll('SELECT * FROM chn_video WHERE '.$where);
		$res	  =	$db->delete('chn_video',$where);
		if ($res){
			foreach ($delrows as $r){ //删除文件
			   file_exists($GLOBALS['upload_video'].$r['screen_img']) && @unlink($GLOBALS['upload_video'].$delrow['screen_img']);
	    	   file_exists($GLOBALS['upload_video'].$r['flv_name']) && @unlink($GLOBALS['upload_video'].$delrow['flv_name']);
				
			}
			alert('删除成功!',$_SESSION['request_url'],1);
		}else{
			alert('删除失败!',$_SESSION['request_url'],1);
		}
	}
	
    public function actpost() {
    	$msg	=	$GLOBALS['msg']['alert'];
	    $posts	=	$this->doPost();	 
	    if(empty($posts['title'])){
	    	alert($msg['notitle']);
	    }	    	    
	    if(empty($posts['category_id'])){
	        alert('分类不能为空');
	    }
	   	$path = $GLOBALS['upload_video']; 	
	   	$videoimg  = $_FILES['videoimg']; 
	    $upimg	=	new Upload($path, $videoimg);
	   	$imgresult = $upimg->doup();
	   	
	    $videofile = $_FILES['videofile'];
	   	$upfile =   new Upload($path, $videofile);
	   	$fileresult = $upfile->doup();	
	    if($posts['act'] == 'edit'){ // 修改             		    		    		    		    	      	    		    		    	
	    	$result =  DB::factory()->update('chn_video',
	    	array(
	    	   'title'        => iconv('utf-8', 'gbk', $posts['title']),
	    	   'category_id'  => $posts['category_id'],
	    	   'screen_img'   => $upimg->filename != '' ? $upimg->filename : $posts['screen_img'],
	    	   'flv_name'     => $upfile->filename != '' ? $upfile->filename : $posts['flv_name'],
	    	   'video_date'   => $posts['video_date'],
	    	   'show_flag'    => $posts['show_flag'],
	    	   'isindex'      => $posts['isindex'],
	    	   'lan_type'     => $GLOBALS['lantype'],
	    	   '[desc]'       => iconv('utf-8', 'gbk', $posts['descr'])
	    	),
	    	   'video_id = '.$posts['video_id']
	    	);      			
	        if ($result){
	        	if($upimg->filename!='' && strlen($posts['screen_img'])>10){ //删除文件
	        	    file_exists($path.$posts['screen_img']) &&   @unlink($path.$posts['screen_img']);        	  
	        	}
	        	if($upfile->filename!='' && strlen($posts['flv_name'])>10){
	        	   file_exists($path.$posts['flv_name']) &&  @unlink($path.$posts['flv_name']);
	        	}
				alert('修改成功!',$_SESSION['request_url'],1);
			}else{
				alert('修改失败!',$_SESSION['request_url'],1);
			}    
	    }else{                     //   增加	        	  
	    	$result = DB::factory()->insert('chn_video',
		    	array(
		    	   'title'        => iconv('utf-8', 'gbk', $posts['title']),
		    	   'category_id'  => $posts['category_id'],
		    	   'screen_img'   => $upimg->filename,
		    	   'flv_name'     => $upfile->filename,
		    	   'video_date'   => $posts['video_date'],
		    	   'show_flag'    => $posts['show_flag'],
		    	   'isindex'      => $posts['isindex'],
		    	   'lan_type'     => $GLOBALS['lantype'],
		    	   '[desc]'         => iconv('utf-8', 'gbk', $posts['descr'])
		    	)
	    	);    
	        if ($result){
				alert('添加成功!',$_SESSION['request_url'],1);
			}else{
				alert('添加失败!',$_SESSION['request_url'],1);
			}     
	    }
	    
	}
	
	
}	