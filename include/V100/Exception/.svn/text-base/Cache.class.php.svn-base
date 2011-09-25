<?php
/***
 * 處理所有異常
 */
define("EXCEPTION_CACHE_TYPE_SUPPORT",0x0401);

final class Cache_Exception extends RAF_Exception {

	function __construct($message,$code=0) {
		parent::__construct($message,$code);
	}

	function handleEx($msg = array()) {
		$AppUI = RAF_App::getInstance();
		switch($this->code) {
			case EXCEPTION_CACHE_TYPE_SUPPORT:
				$title = 'Cache type not support';
				$content = 'Cache type is not support:<span class="key">' .$this->message . '</span>';
				break;
		}
		
		parent::handleEx(array('title'=>$title, 'content'=>$content));
	}
}

?>
