<?php
/**
 * RAF 1.0
 * 程序流程：
 * 1、生成系統唯一實例：$AppUI，利用此對象，可以控制系統流向
 * 2、具體流程：RAF_App::run()：
 *   a、RAF_Request::init();
 *   b、RAF_Router::parse();
 *   c、$Action->$method();
 * 3、在每一個具體的流程前，都利用攔截器進行過濾，直接調用Config/Interceptor.inc.php中的操作
 * Last Update：2008-12-26 11:17
 */
define("RAF_VERSION","1.1218");
define("DR",DIRECTORY_SEPARATOR);

define("RAF_PATH",realpath(dirname(__FILE__)));//RAF路徑
define("RAF_LIB",realpath(dirname(__FILE__) . DR .  "Libs"));//RAF路徑

define("APP_PATH",realpath(dirname($_SERVER["SCRIPT_FILENAME"])));//APP路徑
define("APP_LIB",APP_PATH . DR .  "Libs");

//加載基本程序
require_once(RAF_PATH . "/Stdlib.php");

___magic_quotes_filter();

function __autoload($class_name) {
	autoload($class_name);
}


$AppUI	=	RAF_APP::getInstance();
//$AppUI->setInterceptor(RAF_PATH . DR . "Config" . DR . "Interceptor.inc.php");

?>