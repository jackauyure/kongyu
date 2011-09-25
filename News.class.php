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
		$db	=	DB::factory();

		// 取第一条新闻类型
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_type='2'";
		$order	=	"show_order DESC";
		$category	=	$db->getAllRow("chn_category",$where,$order);
		if (!empty($category)) foreach ($category as $cate){
			$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '".$cate['category_id']."'";
			$order	=	"news_date DESC";
			$sql	=	"SELECT TOP 5 * FROM [chn_news] WHERE $where ORDER BY $order";
			$news_list[$cate['category_id']]	=	$db->getAll($sql);
		}		
		include 'view/newsshow.php';
	}
	
	public function download() {
		$db	=	DB::factory();
	
		$category_id	=	'79';
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '".$category_id."'";
		$order	=	"news_date DESC";
		$sql	=	"SELECT * FROM [chn_news] WHERE $where ORDER BY $order";
		
		$news_list	=	$db->getAll($sql);
		
		include 'view/download.php';
	}
	
	public function broad() {
		$db	=	DB::factory();
	
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_type='6'";
		$order	=	"show_order DESC";
		$category	=	$db->getAllRow("chn_category",$where,$order);
		if (!empty($category)) foreach ($category as $cate){
			$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '".$cate['category_id']."'";
			$order	=	"news_date DESC";
			$sql	=	"SELECT TOP 5 * FROM [chn_news] WHERE $where ORDER BY $order";
			$news_list[$cate['category_id']]	=	$db->getAll($sql);
		}
		
		include 'view/broad.php';
	}
	
	public function newslist() {
		$msg	=	$GLOBALS['msg']['manage'];
		
		$category_id		=	$this->doGet('id','');
		if (empty($category_id)){
			$this->index();
		}
		
		$db	=	DB::factory();
		
		// 取第一条新闻类型
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_id='".$category_id."'";
		$order	=	"show_order DESC";
		$cate	=	$db->getOneRow("chn_category",$where,$order);
		fromStr($cate);
		
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '".$category_id."'";
		$order	=	"news_date DESC";
		$sql	=	"SELECT * FROM [chn_news] WHERE $where ORDER BY $order";
		
		$pageNum	=	30;
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
				
		include 'view/newslist.php';
	}
	
	public function news() {
	
		$msg	=	$GLOBALS['msg']['manage'];
		
		$news_id		=	$this->doGet('id','');
		if (empty($news_id)){
			$this->index();
		}
		
		$db	=	DB::factory();
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND news_id = '".$news_id."'";
		$order	=	"news_date DESC";
		$sql	=	"SELECT * FROM [chn_news] WHERE $where ORDER BY $order";
		$news	=	$db->getOne($sql);
		fromStr($news);
		
		// 取第一条新闻类型
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_id='".$news['category_id']."'";
		$order	=	"show_order DESC";
		$cate	=	$db->getOneRow("chn_category",$where,$order);
		fromStr($cate);
		
		include 'view/news.php';
	}
	
    /**
	 * 合作伙伴的LOGO展示
	 */
    public function cooplist() {		 
		$msg	=	$GLOBALS['msg']['manage'];					
		$db  	=	DB::factory();			
			
	    $where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_type='1'";
		$order	=	"show_order DESC";
		$category	=	$db->getAllRow("chn_category",$where,$order);
		if (!empty($category)) foreach ($category as $cate){
			$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND category_id = '".$cate['category_id']."'";
			$order	=	"show_order DESC";
			$sql	=	"SELECT * FROM [chn_news] WHERE $where ORDER BY $order";
			$pics_list[$cate['category_id']]	=	$db->getAll($sql);
		}

		include 'view/cooperate.php';
	}
}