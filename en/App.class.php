<?php
/**
 * @author Rusher.Ren
 * @version 1.0 2011.09.14
 */
class AppAction extends RAF_Action {
	
	public function AppAction(){		
	}
	
	public function index() {
		redirect($GLOBALS['url'][0]);
		exit;
		$db	=	DB::factory();
		
		// 取第一条新闻类型
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag='1' AND category_type='2'";
		$order	=	"show_order DESC";
		$index_category	=	$db->getOneRow("chn_category",$where,$order);

		// 取一条焦点新闻
		$where	=	"lan_type = '".$GLOBALS['lantype']."' AND show_flag = '1' AND focus_flag='1'";
		$order	=	"news_date DESC";
		$index_news	=	$db->getOneRow("chn_news",$where,$order);

		
		include $GLOBALS['view'].'index.php';
	}
	
	public function getCode(){
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		$rsi = "";
		$code = "";
		$rsi = load_class('ImageRSI');
		$code = $rsi->RandRSI();
		$_SESSION["pwdt"] = $code;
		$rsi->Draw();
		exit;
	}
}