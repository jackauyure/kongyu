<?php
/***
 * 用戶請求處理基類
 */

abstract class RAF_Action extends RAF_Request {
	
	public $Action;
	public $Method;
	
    protected $AppUI;
	
	
	/**
	 * 信息提示頁
	 */
	public $type;
	public $msg;
	public $second;
	public $url;
	
	protected $error;
	protected $errno;
	
    public $view_param;

	/***
	 * 空函數
	 * @return false 
	 */
	function __construct () {
	}

	/***
	 * 默認的執行類
	 * @return 
	 */
	function execute($method) {
		if(!method_exists($this,$method)) {
			throw new System_Exception($method,EXCEPTION_SYSTEM_MISS_METHOD);
		}
		$this->$method();		
	}
	
	/**
	 * 獲取APP配置
	 */
	function config($key='',$value='') {
		$this->AppUI = RAF_App::getInstance();
		return $this->AppUI->config($key,$value);
	}
	
    function assign($key,$value) {
        $this->view_param[$key] = $value;
    }

    function display($view = '') {
        if(empty($view)) {
            $view = $this->view_param['app_view_path'];
        }
        if(false === strpos($view,DR)) {
            $view_path = $this->config('view_path') . DR . $view;
        }else {
            $view_path = $view;
        }
        if(file_exists($view_path)) {
            $this->view_param['app_view_path'] = $view;
            //開始設置緩存
            if($this->config('cache') && $_SERVER['REQUEST_METHOD'] == 'GET') {
                $cache = RAF_Cache::factory();
                $cache->save(MD5($_SERVER['REQUEST_URI']),$this->view_param);
            }
            extract($this->view_param);
            require_once($view_path);
        }else {
            throw new App_Exception($view,EXCEPTION_VIEW_PATH_ISNOT_EXIST);
        }
    }
}
?>
