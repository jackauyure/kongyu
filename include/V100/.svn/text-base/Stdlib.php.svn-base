<?php

/***
 * 自動加載
 * 
 * 尋找順序：
 * 1、Core
 * 2、Stdlib
 * 3、RunupCore
 * 4、Plugin
 * 5、Extends
 * 
 * @return 
 */
require_once('Filter.php');

function autoload($class_name) {
	try {
	    //是否為核心類
	    $type   =   substr($class_name,0,3);
	    if($type == "RAF") {
	        $name   =   ucwords_deep(substr($class_name,4));
	        $path   =   RAF_PATH . DR . "Core" . DR . $name . ".class.php";
	        return load($path);
	    }
	    
	    //是否為異常類    
	    $type     =   substr($class_name,-9);
	    if($type == "Exception") {
	        $name = substr($class_name,0,-10);
	        $path = RAF_PATH . DR . "Exception" . DR . $name . ".class.php";
	        return load($path);
	    }
	    
	    //是否為DB類
	    if($class_name == "DB") {
	        $path   =   RAF_PATH . DR . "Db" . DR . "DB.class.php";
	        return load($path);
	    }
		
		//是否為Action
		$type     =   substr($class_name,-6);
		if($type == "Action") {
			$name     =   substr($class_name,0,-6);
			$path     =   APP_PATH . DR . $name . ".class.php";
			if(!file_exists($path)) {
				throw new System_Exception($path,EXCEPTION_SYSTEM_MISS_ACTION);
			}
			return load($path);
		}
			
		//其它
		return load_includes($class_name . ".class.php");
	}catch(RAF_EXCEPTION $e) {
		$e->handleEx();
	}
}
 
/**
 * 加載
 * @return 
 * @param $path Object
 */
function load($path,$type = "common") {
    if(is_readable($path)) {
        return require_once($path);
    }else {
        throw new System_Exception($path,EXCEPTION_SYSTEM_MISS_FILE);
    }
}

/**
 * 加載文件
 * @param $file_name 文件名字，注意大小寫必須一致！
 */
function load_file($file_name) {
    $pos      =   strpos($file_name,".");
    if(false === $pos) {
    	return load_class($file_name,false);
    }else {
    	return load_includes($file_name);
    }

}


/**
 * 從配置的include加載文件
 * @param $file_name 文件名字，注意大小寫必須一致！
 */
 function load_includes($file_name) {
	//其它
	$APP   =   RAF_APP::getInstance();
	$includes  =   $APP->config("include_path");
	if(is_array($includes)) {
	    foreach($includes as $tmp) {
	        $path     =   $tmp . DR . $file_name;
	        if(is_readable($path)) {
	            return load($path);
	        }
	    }
	}
 }


/**
 * 此方法主要是集成OMG及Core調用
 * @return
 * @param $space Object
 */
function load_class($class_name,$instance = true) {
    $space    =   $class_name;
    $pos      =   strpos($space,"_");
    
    $type     =   strtolower(substr($space,0,$pos));
    $class    =   substr($space,$pos +1);
    $path     =   str_replace("_",DR,$class);
	
    try {
	    switch($type) {
	        case "omg":
	         $path    =   app_config('Omg_Path') . DR . $path . ".class.php";
			 load($path,$type);
	         break;
	        case "core":
	          $class  =   "Core_" . $class;
	          $path   =   app_config('Core_Path') . DR . $path . ".class.php";
			  load($path,$type);
			  break;
			default:
			  autoload($class_name);
			  $class  =   $class_name;
			  break;
	    }

        if(!class_exists($class)) {
            throw new System_Exception($path,EXCEPTION_SYSTEM_MISS_CLASS);
        }
    }catch (RAF_EXCEPTION $e) {
        $e->handleEx(array('name'=>$class_name));
    }
    if($instance) {
    	return new $class();
    }else {
    	return true;
    }
    
}


/**
 * zend: 測試變量
 * @param $value 測試的變量
 * @param bool $echo 是否輸出
 * @param bool $die 是否結束程序
 */
function dump($var,$die=false) {
	$trace = debug_backtrace();
	echo "<br />File: <b> ".$trace[0]['file']."</b><br/>Line : <b>".$trace[0]['line']."</b><br/>";
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
    if ($die) {
        die();
    }
}


/**
 * 轉換url
 * @return 
 */
function url($action='App',$method='',$param = array()) {
	$AppUI =   RAF_APP::getInstance();
	$root  =   $AppUI->config("Sys_Url");
	$space =   rtrim($AppUI->Space,"/\\");
	$url   =   $root . $space . "/index.php?action=" . $action;
	//訪問方法
	if(!empty($method)) {
		$url	.=	"&method=" . $method;
	}
	//訪問參數
    if (!empty($param)) {
        foreach ($param as $key=>$value) {
            $url    .=  "&" . $key . "=" . $value;
        }
    }
	return $url;
}
 /**
 * 獲得當前使用者IP地址
 */
function get_ip() {
    static $ip = false;
    if ($ip !== false) return $ip;
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $aah) {
        if (!isset($_SERVER[$aah])) continue;
        $cur2ip = $_SERVER[$aah];
        $curip = explode('.', $cur2ip);
        if (count($curip) !== 4)  break; // If they've sent at least one invalid IP, break out
        foreach ($curip as $sup)
        if (($sup = intval($sup)) < 0 or $sup > 255)
        break 2;
        $curip_bin = $curip[0] << 24 | $curip[1] << 16 | $curip[2] << 8 | $curip[3];
        foreach (array(
        //    hexadecimal ip  ip mask
        array(0x7F000001,     0xFFFF0000), // 127.0.*.*
        array(0x0A000000,     0xFFFF0000), // 10.0.*.*
        array(0xC0A80000,     0xFFFF0000), // 192.168.*.*
        ) as $ipmask) {
            if (($curip_bin & $ipmask[1]) === ($ipmask[0] & $ipmask[1])) break 2;
        }
        return $ip = $cur2ip;
    }
    return $ip = $_SERVER['REMOTE_ADDR'];
}



/**
 * **
 * 將一個字符串換成ucwords的格式
 * @param string $string
 * @param string $separator
 * @return string
 */
function ucwords_deep($string,$separator = '') {
	if (empty($separator)) {
		return ucwords(strtolower($string));
	}else {
		$t_str		=	split($separator,strtolower($string));
		$rs			=	"";
		foreach ($t_str as $value) {
			$rs		.=	ucwords($value) . $separator;
		}
		$rs		=	substr($rs,0,-1);
		return $rs;
	}
}

/**
 * JS
 */ 

/**
 * PHP生成Javascript的函數庫
 *
 * @package Helper
 * @version RAF 0.1
 */

/**
 * 提示框消息
 * @author sasumi
 * @copyright Copyright &copy; 2008, sasumi
 * @param string $msg	消息內容，如果沒有消息
 * @param string $url	消息跳轉地址,如果為空，則跳轉到上一頁
 * @param int $second	消息跳轉時間，如果為０，則采用js alert方式彈出信息
 */
function alert($msg="", $url="", $second=0) {
	if(empty($second)){
		if(!empty($msg)) {
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script language="javascript">alert("'.$msg.'");</script>';
		}
		else
			header('Location:'.$url);
		
		if (!empty($url)) 
			echo "<meta http-equiv=\"REFRESH\" content=\"0;URL='".$url."'\">";
		else 
			echo '<script language="javascript">history.go(-1);</script>';	
	}
	else {
		$inf = '<style>body {background-color:#eee}</style><div style="text-align:center"><div style="width:600px; border:5px solid #ddd; margin:50px; padding:0.8em; text-align:left; background-color:white; font-size:1.3em">';
		$inf .= $msg;
		$inf .= '<div style="font-size:12px; margin-top:1em; color:gray;">页面正在自动跳转<a href="'.$url.'" style="color:blue;">这个地址</a>，请稍候...<b id="left_time">'.$second.'</b> 秒,</div></div></div>';
		if($_SERVER['SERVER_PORT'] == '443'){
			echo "<meta http-equiv=\"REFRESH\" content=\"$second;URL='".$url."'\">";
		}else{	
			$inf .= '<script type="text/javascript">var sec = '.$second.'; window.setInterval(cooldown,1000);';
			$inf .= 'function cooldown(){if(sec>0) sec--; else{window.clearInterval(); window.location.replace("'.$url.'"); }; document.getElementById("left_time").innerHTML = sec;}';
			$inf .= '</script>';
		}
		echo $inf;
	}
	exit;
}

/**
 * 僅用於提示框消息
 * @param string $msg	消息內容，如果沒有消息，不做處理
 */
function alert_msg($msg) {
	if(!empty($msg))
		echo '<meta http-equiv="Content-Type" content="text/html; charset=' . app_config('charset') . '"><script language="javascript">alert("'.$msg.'");</script>';
}

/**redirect function(javascript mode)
* @param string $url  redirect url, empty for backstep
*/
function redirect($url = '',$type = 'window'){
	if (!empty($url)) 
		echo '<script language="javascript">'.$type.'.location.href=\''.$url.'\'</script>';
	else 
		echo '<script language="javascript">history.go(-1);</script>';	
	exit();
}

/**
 * 關閉當前窗口，並退出程序
 */
function exit_win()
{
    echo "<script language='Javascript'>";          
    echo "self.close();";
    echo "</script>";
    exit();
}

/**
 * 關閉當前窗口，並重新刷新上級窗口，退出程序
 */
function exit_reload()
{
    echo '<script language="javascript">window.close();opener.location.reload();</script>';
    exit();
}

/**
 * 在一組單選項中，判斷是否為選中的值
 *
 * @param string $value1 比較值一
 * @param string/array  $value2 比較值二
 * @return string
 */
function is_check($value1,$value2) {
    if (is_array($value2)) {
        if (in_array($value1,$value2)) {
            return  "checked";
        }
    }else {
        if (ereg($value1,$value2)) {
            return "checked";
        }
    }

}

/**
 * 在下拉菜單中，判斷是否為選中的值
 *
 * @param string $value1 比較值一
 * @param string/array  $value2 比較值二
 * @return string
 */
function is_selected($value1,$value2) {
    if (is_array($value2)) {
        if (in_array($value1,$value2)) {
            return "selected='selected'";
        }
    }else {
        if (strval($value1) === strval($value2)) {
            return "selected='selected'";
        }
    }
}

/**
 * 格式化數組為字符(緩存用)
 * @param $array 要格式化的數組
 * @param $level 間隔TAB的數量
 * @return string 格式化后的數組
 */
function arrayeval($array, $level = 0) {
	if(!is_array($array)) {
		return "'".$array."'";
	}
	if(is_array($array) && function_exists('var_export')) {
		return var_export($array, true);
	}
	$space = '';
	for($i = 0; $i <= $level; $i++) {
		$space .= "\t";
	}
	$evaluate = "Array(\n";
	$comma = $space;
	if(is_array($array)) {
		foreach($array as $key => $val) {
			$key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
			$val = !is_array($val) && (!preg_match("/^\-?[1-9]\d*$/", $val) || strlen($val) > 12) ? '\''.addcslashes($val, '\'\\').'\'' : $val;
			if(is_array($val)) {
				$evaluate .= "$comma$key => ".arrayeval($val, $level + 1);
			} else {
				$evaluate .= "$comma$key => $val";
			}
			$comma = ",\n$space";
		}
	}
	$evaluate .= "\n)";
	return $evaluate;
}

/**
 * 運行時間(效率參考)
 * @param $is_replay 是否重新計數
 * @param $is_echo 是否輸出
 * @return string
 */
function runtime($is_replay = false,$is_echo = true) {
	static $runtime,$begin;
	$trace	= debug_backtrace();
	$rs		= "<b>File:</b>".$trace[0]['file']." <b>Line:</b>".$trace[0]['line']." ";
	
	$now	=	time();
	$rs		.=	" <b>Time:</b>" . date("Y-m-d H:i:s",$now);
	if(empty($runtime) || true == $is_replay) {

		$begin	=	time();
		$rs	.=	"  <b>Run Begin:</b> 0s<br />";
	}else {
		$rs	.=	"  <b>Run:</b> " . ($now - $runtime) . "s  <b>total:</b>" . ($now - $begin) . "s <br />";
	}
	$runtime	=	$now;
	if($is_echo) echo $rs;
	return $rs;
}


/**
 * Array group by function
 * group array(); by keystr
 * @author sasumi
 * @param array $array
 * @param string $keystr
 * @return $array handle result
 */
function array_group($array, $keystr, $merge = false){
	if(empty($array)) return $array;
	
	$tmp = $result = array();
	foreach($array as $key=>$item){
		$sub_keys = array_keys($item);
		
		if(in_array($keystr, $sub_keys)){
			$result[$item[$keystr]][] = $item;
			if(true == $merge) {
				$rs_merge[$item[$keystr]]			=	$item;
				$rs_merge[$item[$keystr]]['count']	=	count($result[$item[$keystr]]);
			}
		}elseif(false == $merge) {
			$result[count($result)][] = $item;
		}
	}
	
	return (false == $merge) ? $result : $rs_merge;
}

/**
 * ip2addr
 * @param string $ip IP地址
 * @param string $fmt 返回格式，暫無定義
 * @return string handle result
 */
function ip2addr($ip,$fmt = 'all') {
	$iptools	= load_class('OMG_IpOperation');
	$addr		= $iptools->convertIP($ip);
	return $addr;
}

/**
 * 讀LOG文件末幾行數據
 * @param string $file 文件路徑
 * @param string $linefromlast 行數
 * @return string handle result
 */
function readlog($file, $linefromlast){
	$fp = @fopen($file, "r");
	if(empty($fp)) return false;
	$pos = -2;
	$t = " ";
	$rs	=	array();
	$linecounter = 1;
	while ($t != "\n" and $linecounter<=$linefromlast) {
		fseek($fp, $pos, SEEK_END);
		$t = fgetc($fp);
		$pos = $pos - 1;
		if ($t == "\n" and $linecounter < $linefromlast) {
			array_unshift($rs,trim(fgets($fp)));
			fseek($fp, $pos, SEEK_END);
			$t = fgetc($fp);
			$pos = $pos - 1;
			$linecounter = $linecounter +1;
		}
	}
	array_unshift($rs,trim(fgets($fp)));
	fclose($fp);
	return implode('<br>',$rs);
}


/**
 * 獲取系統配置
 */
function app_config($key = '',$value = '') {
	$AppUI = RAF_App::getInstance();
	return $AppUI->config($key,$value);
}

/**
 * 獲取一個url的數據
 * @param string $url URL地址
 * @param array $data POST數據
 */
function curl_get($url,$data = array()) {
    $content = http_build_query($data);
	$content_length = strlen($content);
	ini_set('default_socket_timeout',5);
	$options = array(
	      'http'=>array(
	      'method' => 'POST',
	      'header' =>
	      "Content-type: application/x-www-form-urlencoded\r\n" .
	      "Content-length: $content_length\r\n",
	      'content' => $content,
	      'timeout' => 5
	       )
	);
	$context = stream_context_create($options);
	$rs = file_get_contents($url, false, $context); 	
	return $rs;
}

/**
 * 加密方法,根據不同的版本號產生不同的密碼
 *
 * @param  string  $password  密碼(明文)
 * @param  string  $version   版本號
 * @return string
 */
function raf_password($password,$version='001'){
	switch($version){
		case "001":
			//兩次md5
			$passwd		=	md5(md5($password));
			$passwd		=	str_split($passwd);
			$passwd[32]	=	$passwd[0];
			$passwd[0]	=	$passwd[31];
			unset($passwd[31]);
			$passwd		=	implode($passwd);
		break;
		case "998":
			//不加密(明文)
			$passwd	=	$password;
		break;
		case "999":
			//普通md5
			$passwd	=	md5($password);
		break;
		default:
			$passwd	=	false;
		break;
	}
	return $passwd;
}

/**
 * Translate a result array into a HTML table
 *
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.3.2
 * @link        http://aidanlister.com/repos/v/function.array2table.php
 * @param       array  $array      The result (numericaly keyed, associative inner) array.
 * @param       bool   $recursive  Recursively generate tables for multi-dimensional arrays
 * @param       string $null       String to output for blank cells
 */
function array2table($array, $recursive = false, $null = '&nbsp;') {
    // Sanity check
    if (empty($array) || !is_array($array)) {
        return false;
    }

    if (!isset($array[0]) || !is_array($array[0])) {
        $array = array($array);
    }

    // Start the table
    $table = "<table border='1'>\n";

    // The header
    $table .= "\t<tr>";
    $table .= "<th>no</th>";
    // Take the keys from the first row as the headings
    foreach (array_keys($array[0]) as $heading) {
        $table .= '<th>' . $heading . '</th>';
    }
    $table .= "</tr>\n";

    // The body
    $i = 1;
    foreach ($array as $row) {
        $table .= "\t<tr>" ;
        $table .= "<td>" . $i++ . "</td>";
        foreach ($row as $cell) {
            $table .= '<td>';

            // Cast objects
            if (is_object($cell)) { $cell = (array) $cell; }

            if ($recursive === true && is_array($cell) && !empty($cell)) {
                // Recursive mode
                $table .= "\n" . array2table($cell, true, true) . "\n";
            } else {
                $table .= (strlen($cell) > 0) ?
                    htmlspecialchars((string) $cell) :
                    $null;
            }

            $table .= '</td>';
        }

        $table .= "</tr>\n";
    }

    $table .= '</table>';
    return $table;
}

/**
 * 從php手冊COPY的一個函數，將simplexml的對象轉為PHP數組
 * $arrObjData  simplexml對象
 * @return array
 */
function simple_xml2array($arrObjData, $arrSkipIndices = array()) {
    $arrData = array();
   
    // if input is object, convert into array
    if (is_object($arrObjData)) {
        $arrObjData = get_object_vars($arrObjData);
    }
   
    if (is_array($arrObjData)) {
        foreach ($arrObjData as $index => $value) {
            if (is_object($value) || is_array($value)) {
                $value = simple_xml2array($value, $arrSkipIndices); // recursive call
            }
            if (in_array($index, $arrSkipIndices)) {
                continue;
            }
            $arrData[$index] = $value;
        }
    }
    return $arrData;
}

function toDate($str,$type = 'Y-m-d H:i'){
	if (empty($str) || (date('Y',strtotime($str)) < '1990')){
		return '';
	}
	return @date($type,strtotime($str));
}

function cstr($str,$input='gbk',$output='utf8'){
	if ($str === ''){
		return '';
	}
	return @iconv($input, $output.'//IGNORE', $str);
}

function toStr(&$data){
	if (!empty($data)) foreach ($data as $k=>$v){
		$data[$k]	=	cstr($v,'utf-8','gbk');
	}
}

function fromStr(&$data){
	if (!empty($data)) foreach ($data as $k=>$v){
		$data[$k]	=	cstr($v);
	}
}

// 说明：获取 _SERVER['REQUEST_URI'] 值的通用解决方案
// 来源：drupal-5.1 bootstrap.inc
// 整理：CodeBit.cn ( http://www.CodeBit.cn )
 
function request_uri()
{
    if (isset($_SERVER['REQUEST_URI']))
    {
        $uri = $_SERVER['REQUEST_URI'];
    }
    else
    {
        if (isset($_SERVER['argv']))
        {
            $uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
        }
        else
        {
            $uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
        }
    }
    return $uri;
}