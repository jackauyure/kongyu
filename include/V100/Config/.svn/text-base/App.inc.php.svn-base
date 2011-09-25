<?php
/**
 * 應用項目配置選項
 * RAF在具體環境或應用的調整
 */

//尋找include_path
$incs = array();
if(function_exists('ini_get')) {
	if(DR == '\\') {
		$incs = explode(';',ini_get('include_path'));
	}else {
		$incs = explode(':',ini_get('include_path'));
	}
}

$inc_path = '/var/www/include';
foreach($incs as $inc) {
	if(false !== strpos($inc,'include')) {
		$inc_path = $inc;
	}
}

return array(
	"Lang"   	=> 'zh-tw',          //語言
	"Charset"   => 'utf-8',          //編碼
	
	"Core_Path" => $inc_path . DR . 'Core',
	"Omg_Path"	=> $inc_path . DR . 'OMG',

	"View_Path"	=> APP_PATH . DR . 'view',
		
	"Include_Path"	=>	array(
	    "app_lib"	=>	APP_LIB,
	),

    //Cache
    "Cache"             =>  false,
    "Cache_Lifetime"    =>  600,
    "Cache_Sign"        =>  '',
    "Cache_Group"       =>  '',
    "Cache_Driver"      =>  '',         //cache保存類型
    "Cache_Options"     =>  array(
        'cache_hash'    =>  false,
    ),    //cache額外選項
);
?>
