<?php
/***
 * 處理所有異常
 */

define("EXCEPTION_DB_CONFIG_NOEXIST",0x0201);
define("EXCEPTION_DB_CONFIG_ACTIVE_NOEXIST",0x0202);
define("EXCEPTION_DB_CONFIG_TYPE_NOEXIST",0x0203);

define("EXCEPTION_DB_CONNECT_FAILE",0x0211);
define("EXCEPTION_DB_SELECT",0x0212);
define("EXCEPTION_DB_QUERY_ERROR",0x0213);

define("EXCEPTION_DB_OTHER_ERROR",0x0291);

class Db_Exception extends RAF_Exception {
	var $error_msg;
	
    function __construct($message= null,$code=0,$error_msg = '') {
    	$this->error_msg = $error_msg;
        parent::__construct($message,$code);
    }
    
    /**
     * DB異常處理程序
     * @param array $msg 默認的信息
     */
    function handleEx($msg = array()) {
        $AppUI    =   RAF_APP::getInstance();
        switch($this->code) {
            case EXCEPTION_DB_CONFIG_NOEXIST:
            	$title = "<span class='important'>File:Database.inc.php</span> cannot be access";
            	$content = "You have to confirm the file <span class='key'>Config/Database.inc.php</span> is exist and can be access";
             	break;
             case EXCEPTION_DB_CONFIG_ACTIVE_NOEXIST:
             	$title = "<span class='important'>File:Database.inc.php</span> key of " . $this->message . " is not exist";
             	$content = "You have to confirm the <span class='key'>DB CONFIG ARRAY</span> is setted with <span class='key'>KEY:" . $this->message .  "</span>";
             	break;
             case EXCEPTION_DB_CONFIG_TYPE_NOEXIST:
             	$title = "<span class='important'>File:Database.inc.php</span> DB type is not set";
             	$content = "You have to confirm <span class = 'key'>KEY:type</span> is setted in <span class='key'>DB CONFIG ARRAY:" . $this->message .  "</span>";
             	break;
             case EXCEPTION_DB_CONNECT_FAILE:
             case EXCEPTION_DB_SELECT:
             	$title = "<span class='important'>File:Database.inc.php</span> " . $this->message;
             	$content = !empty($this->error_msg) ? $this->error_msg : 'DB connect or select faile';
             	$content = $this->error_msg;
             	break;
             case EXCEPTION_DB_QUERY_ERROR:
             	$title = 'DB Query Error';
             	$content = "<span class='key'>" . $this->error_msg . '</span><br />' . $this->message;
             	break;
             case EXCEPTION_DB_OTHER_ERROR:
             	$title = 'DB Error';
             	$content = $this->message;
             	break;
        }
        parent::handleEx(array('title'=>$title, 'content'=>$content));
    }
}

?>