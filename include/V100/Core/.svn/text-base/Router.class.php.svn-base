<?php
/***
 * 路由類
 * 根據URL返回相應的action、method
 */

class RAF_Router extends RAF_Basic {
	
	/***
	 * 默認的執行類
	 * @return 
	 */
	public static function parse() {
		$AppUI    =	RAF_APP::getInstance();

		$action   =	get_param($_GET['action'],$AppUI->config("Default_Action"));
		$method   =	get_param($_GET['method'],$AppUI->config("Default_Method"));

		$space    = str_replace(SYS_PATH,"",APP_PATH);
		$space    = str_replace("\\","/",$space);
		
		$AppUI->Space   = $space; 
		$AppUI->Action	= strtolower($action);
		$AppUI->Method	= strtolower($method);
	}
	
}
?>