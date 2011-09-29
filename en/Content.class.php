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
        $id =	10;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/about.php';
	}

	public function shebei(){
		$db	=	DB::factory();
        $id =	11;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/shebei.php';
	}

	public function pinzhi(){
		$db	=	DB::factory();
        $id =	12;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/pinzhi.php';
	}

	public function weizhi(){
		$db	=	DB::factory();
        $id =	13;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/weizhi.php';
	}

	public function tuandui(){
		$db	=	DB::factory();
        $id =	14;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/tuandui.php';
	}

	public function xinxibaohu(){
		$db	=	DB::factory();
        $id =	15;
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
        $id =	20;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/kehu.php';
	}

	public function shehuizeren(){
		$db	=	DB::factory();
        $id =	16;
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
        $id =	17;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/rlzy.php';
	}

	public function lxwm(){
		alert('no');
		$db	=	DB::factory();
        $id =	18;
		if(''==$id){
		  exit('参数出错');
		}
		$where = 'chncup_id ='.$id;
		$nr	=	$db->getOneRow('chn_chncup',$where,'');		
		include 'view/lxwm.php';
	}
}