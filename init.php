<?php 
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
session_start();
require_once 'include/V100/RAF.php';
$AppUI->setAppPath(dirname(__FILE__));

if (isset($_GET['lang']) && in_array($_GET['lang'],array('cn','en'))){
	$_SESSION['lang']		=	$_GET['lang'];
}
$GLOBALS['lang']		=	(isset($_SESSION['lang']) && !empty($_SESSION['lang']))?$_SESSION['lang']:'cn';

//老数据里面1表示中文版,2表示英文版
$GLOBALS['lantype']		=	(isset($GLOBALS['lang']) && ($GLOBALS['lang'] == 'en'))?'2':'1';
//$GLOBALS['msg']			=	array();
//load(SYS_PATH
if (!isset($GLOBALS['msg']) || empty($GLOBALS['msg'])){
	$Lang_Path	=	SYS_PATH . DR . 'Lang'  . DR . $GLOBALS['lang'];
	if (is_dir($Lang_Path)){
		$handle  = opendir($Lang_Path);	
		$temp_msg	=	array();	
		while (false !== ($filename = readdir($handle))){
			$temp_arr	=	array();	
			if(substr($filename, -4) == '.php'){
				$file	=	$Lang_Path . DR . $filename;
				$key	=	str_replace('.php','',$filename);
				if(file_exists($file)){
					$temp_arr	=	include_once($file);
					if (!empty($temp_arr)){
						$temp_msg[$key]	=	$temp_arr;
					}
				}
			}
		}
		$GLOBALS['msg']	=	$temp_msg;
	}
}

$GLOBALS['www_root']	=	'http://localhost/kongyu/';
//$GLOBALS['www_root']	=	'http://2010.chncup.com/';
$GLOBALS['en_root']		=	$GLOBALS['www_root'].'en/';
$GLOBALS['admin_root']	=	$GLOBALS['www_root'].'manage/';
$GLOBALS['mini_root']	=	$GLOBALS['www_root'].'minisite/';
$GLOBALS['style']		=	$GLOBALS['www_root']. 'style/';

//上传用
$GLOBALS['upload']         =   dirname(__FILE__).'/upload/';
$GLOBALS['upload_doc']     =   $GLOBALS['upload'].'doc/';
$GLOBALS['upload_images']  =   $GLOBALS['upload'].'images/';
$GLOBALS['upload_video']   =   $GLOBALS['upload'].'video/';  


//前台用
$GLOBALS['updoc']          =   $GLOBALS['www_root'].'upload/doc/';  
$GLOBALS['upimages']       =   $GLOBALS['www_root'].'upload/images/'; 
$GLOBALS['upvideo']        =   $GLOBALS['www_root'].'upload/video/'; 

$GLOBALS['view']	=	dirname(__FILE__).'/view/';

$GLOBALS['url']	=	array(
	// 0-8
	'?action=content&method=about',
	$GLOBALS['www_root'],
	$GLOBALS['en_root'],
	'?action=content&method=shebei',
	'?action=content&method=kehu',
	'?action=content&method=shehuizeren',
	'?action=news',
	'?action=content&method=rlzy',
	'?action=content&method=lxwm',

	// 9-13
	'?action=content&method=shebei',
	'?action=content&method=pinzhi',
	'?action=content&method=weizhi',
	'?action=content&method=tuandui',
	'?action=content&method=xinxibaohu',

	// 14-15
	'?action=news',
	'?action=news&method=cpxc',
);

?>