<?php
/***
 * 處理程序運行異常
 */

define("EXCEPTION_VIEW_PATH_ISNOT_EXIST",0x0101);
class App_Exception extends RAF_Exception {
	var $error_msg;
	
    function __construct($message= null,$code=0x0301,$error_msg = '') {
    	$this->error_msg = $error_msg;
        parent::__construct($message,$code);
    }
    
    /**
     * DB異常處理程序
     * @param array $msg 默認的信息
     */
    function handleEx($msg = array()) {
    	//特殊HTTP處理
    	if(is_numeric($this->message)) {
    		switch($this->message) {
    			case '403':
    				header('HTTP 1.1/403');break;
    			case '404':
    				header('HTTP 1.1/404');break;
    		}
    		exit;
    	}
    	//常規處理
        $AppUI = RAF_APP::getInstance();
        switch($this->code) {
            case EXCEPTION_VIEW_PATH_ISNOT_EXIST:
                $title = "View Path is not exist";
                $content = 'Please confirm the view file is exist in File:<br /><span class="key">' .$this->message . '</span>';
                break;
        }
        parent::handleEx(array('title'=>$title, 'content'=>$content));
    }
}

?>
