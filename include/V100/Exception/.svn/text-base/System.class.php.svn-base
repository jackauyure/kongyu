<?php
/***
 * 處理所有異常
 */
define("EXCEPTION_SYSTEM_MISS_FILE",0x0101);
define("EXCEPTION_SYSTEM_MISS_CLASS",0x0102);
define("EXCEPTION_SYSTEM_MISS_INTERCEPTOR_CLASS",0x0104);
define("EXCEPTION_SYSTEM_MISS_INTERCEPTOR_METHOD",0x0105);

define("EXCEPTION_SYSTEM_MISS_ACTION",0x0111);
define("EXCEPTION_SYSTEM_MISS_METHOD",0x0112);

define("EXCEPTION_SYSTEM_EXCEPTION",0x0199);


final class System_Exception extends RAF_Exception {

	function __construct($message,$code=0) {
		parent::__construct($message,$code);
	}

	function handleEx($msg = array()) {
		$AppUI = RAF_App::getInstance();
		switch($this->code) {
			case EXCEPTION_SYSTEM_MISS_FILE:
				$title = 'File Lose';
				$content = 'Please confirm is file is exist and can be access:<br /><span class="key">' .$this->message . '</span>';
				break;
			 
			 case EXCEPTION_SYSTEM_MISS_CLASS:
			 	$title = "Class <span class='important'>" . $msg['name'] . '</span> is Lose';
			    $content    =   "Please confirm class is exist in File：<br />"
			    			.	"<span class='key'>" . $this->message . '</span>';
				break;
			 
			 case EXCEPTION_SYSTEM_MISS_INTERCEPTOR_CLASS:
			 	$title = "Interceptor Class <span class = 'important'>{$msg['name']}</span> is Lose";
				$content = 'Please confirm the class is exist in Interceptor File:<br /><span class="key">' .$this->message . '</span>';
				break;
			 
             case EXCEPTION_SYSTEM_MISS_INTERCEPTOR_METHOD:
			 	$title = "Interceptor Method <span class = 'important'>{$msg['method']}</span> isnot exist";
				$content = 'Please confirm the method is exist in Interceptor File:<br /><span class="key">' .$this->message . '</span>';
                break;
        	case EXCEPTION_SYSTEM_MISS_ACTION:
        		$title = 'Action File No Fine';
        		$content = 'You have to confirm the Action File:<span class="key">' . $this->message . "</span> is exist and can be access";
        		break;
        	case EXCEPTION_SYSTEM_MISS_METHOD:
        		$action_path = $AppUI->config('App_Action_Path') . DR . ucfirst($AppUI->Action) . '.class.php';
        		$title = 'Method Isnot Exist';
        		$content = "Method(<span class='key'>{$this->message}</span>) isnot exist in file:<span class='key'>" . $action_path . '</span>';
        		break;
            case EXCEPTION_SYSTEM_EXCEPTION:
                $title = 'system exception';
                $content = 'System Exception,Please contact administrator.';
                break;
		}
		
		parent::handleEx(array('title'=>$title, 'content'=>$content));
	}
}

?>
