<?php
/***
 * 處理所有Get、Post、Cookie請求的信息
 */


class RAF_Request extends RAF_Basic {
	private static $Get;
	private static $Post;
	
	public static function init() {
		self::$Get	=	$_GET;
		self::$Post	=	$_POST;
	}
	
	public function _GET($key = '') {
		if($key === '') return self::$Get;
		return isset(self::$Get[$key]) ? self::$Get[$key] : null;
	}
	
	public function _POST($key = '') {
		if($key === '') return self::$Post;
		return isset(self::$Post[$key]) ? self::$Post[$key] : null;
	}
	
	/**
	 * 獲取GET變量
	 * @param string $key GET的鍵碼
	 * @param string $value
	 * @return mix 返回處理過的GET變量
	 */
	public function doGET($key='',$value=null) {
		//add by sasumi
		//using null key for all GET vars
		
		if(empty($key))
			return get_param(self::$Get);
		return isset(self::$Get[$key]) ? get_param(self::$Get[$key],$value) : $value;
	}
	
	/**
	 * 獲取POST變量
	 * @param string $key POST的鍵碼
	 * @param string $value
	 * @return mix 返回處理過的POST變量
	 */
	public function doPOST($key='',$value=null) {
		//add by sasumi
		//using null key for all POST vars
		if(empty($key))
			return get_param(self::$Post);
			
        return isset(self::$Post[$key]) ? get_param(self::$Post[$key],$value) : $value;
	}

}
?>