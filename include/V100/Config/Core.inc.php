<?php
return array(

	/**
	 * Core
	 */
	"Interceptor"      =>	array(),
	"Default_Action"   =>  "app",          //默認的Action
	"Default_Method"   =>  "index",        //默認的方法

	/**
	 * Path相關
	 */
	"Sys_Path"         =>  "",
	"Sys_Config_Path"  =>  "",                             //項目級配置

	"App_Path"         =>  APP_PATH,
	"App_Config_Path"  =>  APP_PATH . DR . "Config",		//模塊級配置
	"App_Action_Path"  =>  APP_PATH,
	
	/**
	 * url相關
	 */
	"Sys_Url"          =>  "",                             //根url
	
	/**
	 * DB配置信息
	 */
	"Db_Config"        =>  array(),                        //DB配置    
	"Include_Path"     =>  array(),                        //autoload加載的路徑
		
	/**
	 * 項目版本，通過檢測包含的字符來判別項目的開發版本和狀態 如 alpha 2302 表示內部測試版本2302版。
	 * alpha => 內部測試版本
	 * beta => 公測版本
	 * official(或置空) 或版本號
	 */
	"Sys_Version" => 'alpha',
	
	/**
	 * 異常配置信息
	 */
	"Error_Log_Path"	=>  "/var/www/phplog",					//錯誤的LOG目錄
	"Error_Log_File"	=>	"app_" . $_SERVER['SERVER_NAME'] . '_error.log',	//文件名稱
	"Error_Msg"			=>	RAF_LIB . DR . 'View' . DR . 'Error_msg.html',
	"Error_Msg_User"	=>	RAF_LIB . DR . 'View' . DR . 'Error_msg_user.html',
	"Error_Log_Write"	=>	false,
	"App_Start"			=>	microtime(),
	"Debug"				=>	false,							//調試模式
);
?>
