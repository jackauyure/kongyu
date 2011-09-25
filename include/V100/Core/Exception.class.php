<?php
/***
 * 處理所有異常
 */
abstract class RAF_Exception extends Exception {

	protected $message;					//錯誤內容
	protected $code;					//錯誤代碼
	protected $level;					//錯誤級別
	
	protected $url;						//跳轉URL
	protected $second;					//跳轉時間
	
    protected $file;					//錯誤文件
    protected $line;					//錯誤代碼行數
    
	protected $time;					//時間
	protected $ip;						//IP
	
	
	protected $message_template;		//消息模板文件
	
	function __construct($message='',$code=0) {
		parent::__construct($message,$code);
		
		$this->time = time();
		$this->ip = $_SERVER['REMOTE_ADDR'];
	}
	
	/**
	 * 設置提示信息
	 * @return 
	 * @param $message Object
	 */
	function init() {
	}
	
	function getEx() {
        return $this->getTrace();
	}
	
	/**
	 * 顯示異常
	 * @param array $msg
	 * @param string $type 消息顯示類別 server | client
	 * @return null
	 */
	function showEx($msg) {
		//判斷當前項目的狀態，如果為內部測試的話，則輸出詳細的錯誤信息
		//如果為公測或者正式發布的話，則顯示友好錯誤信息界面
		$AppUI = RAF_APP::getInstance();
		$debug = $AppUI->config('debug');
		//display url -- modify by benero 2009-03-25 11:27
		$https = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
		$msg['access']['url'] = $https . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$msg['access']['time'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
		$msg['access']['ip'] = get_ip();
		
		if(false === $debug) {
			$error_msg = $AppUI->config('Error_Msg_User');
			if(file_exists($error_msg)) {
				$msg['content'] = 'System Exception! Thanks for report!';
				include $error_msg;
				exit;
			}else {
				header('HTTP 1.1/404');exit;
			}
		}
		
		$error_msg = $AppUI->config('Error_Msg');
		if(file_exists($error_msg)) {
			include $error_msg;
		}
		else {
			echo '<h1>'.$msg['title'].'</h1>';
			echo $msg['content'];
		}
	}
	
	/**
	 * 寫入LOG 文件
	 * @param array $msg 消息變量
	 * @param string $file log文件，置空則設定為系統默認的log.txt
	 */
	function writeEx($msg="", $file="") {
		$AppUI = RAF_APP::getInstance();
		if(false == $AppUI->config('Error_Log_Write')) {
			return;
		}

		list($usec, $sec) = explode(' ',$AppUI->config('App_Start'));
		$start_time	=	((float)$usec + (float)$sec);
		list($usec, $sec) = explode(' ',microtime());
		$end_time	=	((float)$usec + (float)$sec);
		$exec_time	=	round($end_time - $start_time,4);
		
		$file	=	$AppUI->config('Error_Log_Path') . DR . $AppUI->config('Error_Log_File');
		$fp = @fopen($file,'a+');
		if($fp) {
			$info = date("Y-m-d H:i:s",$this->time) . "\t" . $exec_time . "\t" . $_SERVER['REQUEST_URI'] . "\t" . strip_tags($msg['content']) . "\t" . get_ip() . "\r\n";
			$result = fwrite($fp,$info);
			return $result;
		}
	}
	
	/**
	 * 處理出錯信息
	 * @param array $msg	消息｜'title'=>標題, 'content'=>內容
	 * @param string $mod	處理模式| 'w':寫入log 文件, 's':顯示出錯
	 */
	function handleEx($msg="", $mod='sw'){
		
		$trace = $this->getTraceAsRafString();
		
		$AppUI = RAF_APP::getInstance();
		
		if(empty($msg['trace'])) {
			$msg['trace'] = $trace;
		}
		
		if(empty($msg['title'])) {
			$msg['title'] = 'System Exception';
		}
		
		if(empty($msg['content'])) {
			$msg['content'] = 'unknow exception,please check the system trace info';
		}

		$mod = strtolower($mod);
		if(strpos($mod,'w')!==false)
			$result = $this->writeEx($msg);
			
		if(strpos($mod,'s')!==false)
			$this->showEx($msg);
		die();
	}
	
    function getTraceAsRafString() {
        $out = '';
        $ix = 0;
        $trace = $this->getEx();
        foreach ($trace as $point) {
        	if(false === strpos($point['file'],RAF_PATH)) {
        		$out .= "<span class='key'>#{$ix} {$point['file']}({$point['line']}): {$point['function']}(";
        	}else {
        		$out .= "<span>#{$ix} {$point['file']}({$point['line']}): {$point['function']}(";
        	}
            if (is_array($point['args']) && count($point['args']) > 0) {
                foreach ($point['args'] as $arg) {
                    switch (gettype($arg)) {
                    case 'array':
                    case 'resource':
                        $out .= gettype($arg);
                        break;
                    case 'object':
                        $out .= get_class($arg);
                        break;
                    case 'string':
                        if (strlen($arg) > 30) {
                            $arg = substr($arg, 0, 27) . ' ...';
                        }
                        $out .= "'{$arg}'";
                        break;
                    default:
                        $out .= $arg;
                    }
                    $out .= ', ';
                }
                $out = substr($out, 0, -2);
            }
            $out .= ")</span><br />";
            $ix++;
        }
        $out .= "#{$ix} {main}<br />";

        return $out;
    }

}

?>