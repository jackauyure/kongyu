<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class NewsAction extends RAF_Action {
	
	public function NewsAction(){
		if ($GLOBALS['lang'] == 'en'){
			redirect($GLOBALS['en_root']);
		}
	}
	
	public function index() {

		$msg	=	$GLOBALS['msg']['manage'];
		
		$category_id		=	$this->doGet('id','4');
		if (empty($category_id)){
			alert('error');//$this->index();
		}
		
		$db	=	DB::factory();
		
		
		$where	=	"show_flag = '1' AND category_id = '".$category_id."'";
		$order	=	"news_date DESC";
		$sql	=	"SELECT * FROM chn_news WHERE $where ORDER BY $order";
		
		$pageNum	=	12;
		$pageConfig	=	array(
			'first'	=>	$msg['first'],
			'prev'	=>	$msg['prev'],
			'next'	=>	$msg['next'],
			'last'	=>	$msg['last'],
			'jump'	=>	$msg['jump'],
			'page'	=>	$msg['page'],
		);
		$db->setPage($pageNum,$pageConfig);
		$db->page_mode	=	'nums,select';
		$news_list	=	$db->getAll($sql);
		$pagehtml	=	$db->page_html;
				
		include 'view/qytc.php';
	}
	
	public function cpxc() {

		$msg	=	$GLOBALS['msg']['manage'];
		
		$category_id		=	$this->doGet('id','5');
		if (empty($category_id)){
			alert('error');//$this->index();
		}
		
		$db	=	DB::factory();
		
		
		$where	=	"show_flag = '1' AND category_id = '".$category_id."'";
		$order	=	"news_date DESC";
		$sql	=	"SELECT * FROM chn_news WHERE $where ORDER BY $order";
		
		$pageNum	=	15;
		$pageConfig	=	array(
			'first'	=>	$msg['first'],
			'prev'	=>	$msg['prev'],
			'next'	=>	$msg['next'],
			'last'	=>	$msg['last'],
			'jump'	=>	$msg['jump'],
			'page'	=>	$msg['page'],
		);
		$db->setPage($pageNum,$pageConfig);
		$db->page_mode	=	'nums,select';
		$news_list	=	$db->getAll($sql);
		$pagehtml	=	$db->page_html;
				
		include 'view/cpxc.php';
	}
}