<?php
/**
 * @author chenm
 * @version 1.0 2011.09.21
 */
class PicsAction extends RAF_Action {
	
	public function PicsAction(){
		if ($GLOBALS['lang'] == 'en'){
			redirect($GLOBALS['en_root']);
		}
	}
	
	public function index() {
		$db	=	DB::factory();
        $category_id = $this->doGet('id','');
		$sql	=	"SELECT c.category_name, i.* from chn_category as c 
					INNER JOIN chn_img as i on c.category_id = i.category_id WHERE 
					c.category_type = 3 AND c.category_id = ".$category_id;
		$picsinfo	=	$db->getAll($sql);		
		include 'view/picsshow.php';
	}
	
	public function picslist() {		
		$msg	=	$GLOBALS['msg']['manage'];					
		$db	=	DB::factory();			
			
	    $where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_type='3'";
		$order	=	"show_order DESC";
		$category	=	$db->getAllRow("chn_category",$where,$order);
		if (!empty($category)) foreach ($category as $cate){
			$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '".$cate['category_id']."'";
			$order	=	"img_date DESC";
			$sql	=	"SELECT TOP 5 * FROM [chn_img] WHERE $where ORDER BY $order";
			$pics_list[$cate['category_id']]	=	$db->getAll($sql);
		}

		include 'view/picslist.php';
	}	
}