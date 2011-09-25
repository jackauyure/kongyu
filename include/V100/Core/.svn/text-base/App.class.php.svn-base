<?php
/**
 * APP UI：Front_Controller Design Patten
 * 
 * RAF 程序主調用類
 * @version:0.1
 * 
 * 命名規則：
 * 1、核心庫以開頭，采用大小與_進行分隔
 * 2、方法名采用駱駝命名規則，首字母小寫
 * 3、屬性名采用駱駝命名規則，首字母大寫
 */


class RAF_App extends RAF_Request {
	private static $AppUI;
	private $Config;
	
	public $Space;     //命名空間 
	public $Action;    //操作的ACTION
	public $Method;    //操作方法
	
	
	/***
	 * 禁止直接生成AppUi實例
	 * @return false 
	 */
	private function __construct () {
		//系統配置更新 add by benero:2008-12-31 10:11
		$configs	=	array();
		$configs	=	array_merge($configs,load(RAF_PATH . "/Config/Core.inc.php",'Config'));
		$configs	=	array_merge($configs,load(RAF_PATH . "/Config/App.inc.php",'Config'));
		$this->Config	=	$configs;
	}
	
	/***
	 * 獲取程序實例
	 * @return 
	 */
	public static function getInstance() {
		if(empty(self::$AppUI)) {
			$class_name      =	__CLASS__;
			self::$AppUI      =	new $class_name();
		}
		return self::$AppUI;
	}
	
	
	/***
	 * 執行MVC調用
	 * @return 
	 */
	function run() {
		try {
			RAF_Request::init();
			//Step1：加載攔截器
			//1.1：查看是否加載APP級的攔截器
			$this->setInterceptor(APP_PATH . DR . "Config" . DR . "Interceptor.inc.php");
			RAF_Interceptor::execute("Pre_System");
			//Step2：調用路由分析，將URL還原成URI
			RAF_Router::parse();
			//Step3：執行分配
			RAF_Interceptor::execute("Pre_Action");
			//判斷URL是否被重新分配過
			$space    =   trim($this->Space,"\\/");
			$space_now    = str_replace(SYS_PATH,"",APP_PATH);
			$space_now    = trim(str_replace("\\","/",$space_now),"\\/");
			
			if($space != $space_now) {
				$url     =   url($this->Action,$this->Method);
				alert('',$url);
			}
			//如果APP存在配置文件，則先調用配置文件  add by benero：2008-06-10 23:05
			if(file_exists(APP_PATH . DR . "config.php")) {
				load(APP_PATH . DR . "config.php");
			}
			//調用APP程序
			$class_name   =   ucwords($this->Action) . "Action";
			$obj	=	new $class_name();
			$obj->Action	=	ucwords($this->Action);
			$obj->Method	=	$this->Method;
			//execute method
            if($this->config('cache') && $_SERVER['REQUEST_METHOD'] == 'GET') {
                $cache = RAF_Cache::factory();
                $view_param = $cache->get(MD5($_SERVER['REQUEST_URI']));
                if(false === $view_param) {
			        $obj->execute($this->Method);
                }else {
                    $this->config('cache',false);
                    $obj->view_param = $view_param;
                    $obj->display();
                }
            }else {
			    $obj->execute($this->Method);
            }
			
			RAF_Interceptor::execute("Post_Action");
			//Step4：系統結束
			RAF_Interceptor::execute("Post_System");
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
	}
	
	/**
	 * 配置當前系統運行的基本路徑
	 */
	function setAppPath($path) {
		if(is_readable($path)) {
			define("SYS_PATH",$path);
			define("SYS_LIB",SYS_PATH . DR . "Libs");
			$url     = str_replace("\\","/",$path);
			//modify by benero; 需去掉右邊劃線
			$doc = rtrim($_SERVER["DOCUMENT_ROOT"],"/\\");
			$root    = rtrim(str_replace($doc,"",$url),"/\\");
			define("ROOT_URL",$root);
			//加載項目攔截器
			$this->config("Sys_Path",$path);
			$this->config("Sys_Config_Path",$path . DR .  "Config");
			$this->config("Sys_Url",$root);
			$this->setInterceptor($path . DR . "Config" . DR . "Interceptor.inc.php");
			//重載項目配置
			$app_path	=	$path . DR . "Config" . DR . "App.inc.php";
			if(file_exists($app_path)) {
				$this->Config	=	array_merge($this->Config,load($app_path,'Config'));
			}
			$app_path	=	APP_PATH . DR . "Config" . DR . "App.inc.php";
			if(SYS_PATH != APP_PATH && file_exists($app_path)) {
				$this->Config	=	array_merge($this->Config,load($app_path,'Config'));
			}
	        //加載include配置 增加一個文件的判斷 add by benero2008-7-11 9:39
	        $this->config("include_path",array("sys_lib"=>SYS_LIB));
	        if(file_exists(SYS_PATH . DR . "Config" . DR . "Includes.inc.php")) {
	        	$this->config("include_path",load(SYS_PATH . DR . "Config" . DR . "Includes.inc.php","config"));
	        }
		}
	}
	
	function getInterceptor() {
		return $this->config("interceptor");
	}
	
	/**
	 * 根據攔截器路徑自動設置攔截器列表
	 * @param path $interceptor_path
	 * @return true
	 */
	public function setInterceptor($interceptor_path) {
		if(is_readable($interceptor_path)) {
			$filter_chain	=	require_once($interceptor_path);
			if(is_array($filter_chain)) {
				$chain	=	$this->getInterceptor();
				if(empty($chain)) {
					$this->config("interceptor",$filter_chain);
				}else {
					foreach($chain as $key=>$value) {
						$new_chain[$key]	=	array_merge($chain[$key],$filter_chain[$key]);
					}
					
					$this->config("interceptor",$new_chain);
				}
			}
		}
		return true;
	}
	
		
	
	/**
	 * *配置
	 */
	function config($key = '',$value='') {
		if(empty($key)) {
			return $this->Config;
		}
		
		$key	=	ucwords_deep($key,"_");
		if(isset($this->Config[$key])) {
	        if($value === '') {
	            return array_key_exists($key,$this->Config) ? $this->Config[$key] : null;
	        }else {
	            if(array_key_exists($key,$this->Config)) {
	            	//當值為數組時，採用合並方式 add by benero 2008-12-31 14:05
	            	if(is_array($this->Config[$key]) && is_array($value)) {
	            		$this->Config[$key] =   array_merge($this->Config[$key],$value);
	            	}else {
	            		$this->Config[$key] =   $value;
	            	}
	                
					return true;
	            }else {
	                return false;
	            }
	        }
		}
		return false;
	}
}
?>
