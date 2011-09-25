<?php
/***
 * 系統緩存
 */

class RAF_Cache extends RAF_Request {
	
    private static $instance;

	public $Action;
	public $Method;
	
    public $AppUI;
    private $CacheStore;
	
	/***
	 * 空函數
	 * @return false 
	 */
	function __construct () {
        return false;
	}

    public static function factory() {
        if(empty(self::$instance)) {
            $class_name      =  __CLASS__;
            self::$instance = new $class_name();
            self::$instance->AppUI = RAF_App::getInstance();
            self::$instance->CacheStore = load_class('OMG_CacheStore');
            $cache_sign = self::$instance->AppUI->config('cache_sign');
            if(empty($cache_sign)) {
                $cache_sign = MD5(SYS_PATH);
            }
            $cache_driver = self::$instance->AppUI->config('cache_driver');
            $cache_options = self::$instance->AppUI->config('cache_options');

            self::$instance->CacheStore->init($cache_sign,self::$instance->AppUI->config('cache_lifetime'),$cache_driver,$cache_options);
        }
        return self::$instance;
    }

    public function save($id,$value,$group = '') {
        if(empty($group)) {
            $group = app_config('cache_group');
            if(empty($group)) {
                $group = self::$instance->AppUI->Action . '_' . self::$instance->AppUI->Method;
            }
        }
        return self::$instance->CacheStore->save($id,$value,$group);
    }

    public function get($id,$group = '') {
        if(empty($group)) {
            $group = app_config('cache_group');
            if(empty($group)) {
                $group = self::$instance->AppUI->Action . '_' . self::$instance->AppUI->Method;
            }
        }
        return self::$instance->CacheStore->get($id,$group);
    }

    public function remove($id, $group = '') {
        if(empty($group)) {
            $group = app_config('cache_group');
            if(empty($group)) {
                $group = self::$instance->AppUI->Action . '_' . self::$instance->AppUI->Method;
            }
        }
        return self::$instance->CacheStore->remove($id,$group);
    }

    public function clean() {
        return self::$instance->CacheStore->clean();
    }

    public function debug() {
        return self::$instance->CacheStore->debug();
    }

}
?>
