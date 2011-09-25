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
}