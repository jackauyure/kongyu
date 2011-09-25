<?php
/***
 * 重載管理器
 */

class RAF_Interceptor extends RAF_Basic {
	
	
    public static function execute($key) {
		$filter_chain	=	self::getFilterChain($key);
		if(!empty($filter_chain)) {
			foreach($filter_chain as $key=>$filter) {
				$class		=	$filter["class"];
				$method		=	$filter["method"];
				$path		=	$filter["path"];
				$param		=	array_key_exists('param',$filter) ? $filter['param'] : '';	//add by benero：default setting 2008-9-8 21:01
				if(empty($class)) continue;
				try {
					load($path,"INTERCEPTOR");
					if(!class_exists($class)) {
						throw new System_Exception($path,EXCEPTION_SYSTEM_MISS_INTERCEPTOR_CLASS);
					}
					$obj       =   new $class($param);
                    if(method_exists($obj,$method)) {
                        $obj->$method();
                    }else {
                    	throw new System_Exception($path,EXCEPTION_SYSTEM_MISS_INTERCEPTOR_METHOD);
                    }
				}
				catch(RAF_EXCEPTION $e) {
					$e->handleEx(array('name'=>$class,'method'=>$method));
				}
			}
		}
	}
	
	
	
	private static function getFilterChain($key) {
		$key	=	strtolower($key);
		$AppUI	=	RAF_APP::getInstance();
		$interceptor	=	$AppUI->config("interceptor");
		if(array_key_exists($key,$interceptor)) {
			return $interceptor[$key];
		}
	}
	
}

?>