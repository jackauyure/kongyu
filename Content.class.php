<?php
/**
 * @author chenm
 * @version 1.0 2011.09.21
 */
class ContentAction extends RAF_Action {
	
	public function ContentAction(){
		if ($GLOBALS['lang'] == 'en'){
			redirect($GLOBALS['en_root']);
		}
	}
	
	public function index() {
		$db	=	DB::factory();
        $id = $this->doGet('id','');
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id.' and lan_type = '.$GLOBALS['lantype'];
		$contentinfo	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/contentshow.php';
	}
	
	public function about() {
		$db	=	DB::factory();
        $id =	1;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/about.php';
	}

	public function shebei(){
		$db	=	DB::factory();
        $id =	2;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/shebei.php';
	}

	public function pinzhi(){
		$db	=	DB::factory();
        $id =	3;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/pinzhi.php';
	}

	public function weizhi(){
		alert('no');
		$db	=	DB::factory();
        $id =	4;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/weizhi.php';
	}

	public function tuandui(){
		$db	=	DB::factory();
        $id =	5;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/tuandui.php';
	}

	public function xinxibaohu(){
		$db	=	DB::factory();
        $id =	6;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/xinxibaohu.php';
	}

	public function kehu(){
		alert('no');
		$db	=	DB::factory();
        $id =	7;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/kehu.php';
	}

	public function shehuizeren(){
		$db	=	DB::factory();
        $id =	7;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/shehuizeren.php';
	}

	public function rlzy(){
		alert('no');
		$db	=	DB::factory();
        $id =	8;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/rlzy.php';
	}

	public function lxwm(){
		$db	=	DB::factory();
        $id =	9;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/lxwm.php';
	}
}