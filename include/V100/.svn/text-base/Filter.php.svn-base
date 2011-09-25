<?php
/*
 * @$arr:变量
 * @$def:变量为空时的默认值
 * @$type:变量类型
 */
function get_param(&$arr,$def='',$type='common',$name='') {
	if (is_array($arr) && isset($arr[$name])) {
		$str	=	&$arr["$name"];
	}elseif (isset($arr) && empty($name)) {
		$str	=	$arr;
	}else {
		return $def;
	}
	//如果數值是數組，則循環過濾值
	if (is_array($str)) {
		foreach ($str as $key=>$element) get_param($str,$def,$type,$key);
	}

	if (!is_array($str)) {
		$str = _filter_param($str,$def);
	}// if end
	return $str;
}

//過濾函數
function _filter_param($str,$def='') {
	$str	=	trim($str);
	$str	=	strip_tags($str);
	
    $i = 0; 
    $w = 0;
    $len = strlen($str); 
    $return_str = ''; 
    
    if ($len<1) return empty($return_str) ? $def : $return_str;
    
    while ($i < $len) { 
    	if (ord($str{$i}) < 0x80) { 
    		$w	=	1;
    	} 
    	else if (ord($str{$i}) < 0xe0) { 
    		$w	=	2;
    	} 
    	else if (ord($str{$i}) < 0xf0) { 
    		$w	=	3;
    	} 
    	else if (ord($str{$i}) < 0xf8) { 
    		$w	=	4;
    	} 
    	else if (ord($str{$i}) < 0xfc) { 
    		$w	=	5;
    	} 
    	else if (ord($str{$i}) < 0xfe) { 
    		$w	=	6;
    	} 
    	
    	$tmp_str=substr($str,$i,$w);
    	
    	$i+=$w;
    	
    	if ($w==1){
    		$tmp_str=addslashes($tmp_str);
    	}
    	$return_str.=$tmp_str;
    }//while end
    if (ord(substr($return_str,-1,1))==92){
    	$return_str=$return_str.' ';
    }//if end
    return ($return_str === '') ? $def : $return_str;
}


function ___magic_quotes_filter() {
    if (!get_magic_quotes_gpc()) { return; }
    $in = array(& $_GET, & $_POST, & $_COOKIE, & $_REQUEST);
    while (list($k,$v) = each($in)) {
    	foreach ($v as $key => $val) {
    		if (!is_array($val)) {
    			$in[$k][$key] = stripslashes($val);
    			continue;
    		}
    		$in[] =& $in[$k][$key];
    	}
    }
    unset($in);
}
?>