<?php
/***
 * DB查詢基類
 */
class DB {
	
    /**
     * 公共設置
     */
    var $debug         = 0;     ## Set to 1 for debugging messages.
    var $Halt_On_Error = "report"; ## "yes" (halt with message), "no" (ignore errors quietly), "report" (ignore error, but spit a warning)
    var $PConnect      = 0;     ## Set to 1 to use persistent database connections
	var $clear		   = 1;		## is clear the db query info
    
    /**
     * 查詢輔助對象
     */
	var $type;
	var $table;
	var $field;
	var $where;
	var $order;
	var $group;
	var $offset;
	var $pk;           //PriKey
	
	var $per_num;		//分頁信息　－　每頁的數據行數
	var $page_info;		//分頁信息 array
    var $page_html;		//分頁默認HTML
    var $page_config;	//分頁設置
    var $page_mode;		//分頁顯示模塊
    var $page_access = 'page';   //分頁的訪問參數，默認是 page  2010-05-28 19:53
    
    /**
     * 保存當前的記錄集及記錄數
     */
    var $Record   = array();
    var $Row;
    
    /**
     * 保存DB查詢錯誤ID與信息
     */
    var $Errno    = 0;
    var $Error    = "";
	
    /**
     * 保存DB連接、查詢資源
     */
    protected $Link_ID  = 0;
    protected $Query_ID = 0;
  	
	/**
	 * DB查詢相關
	 */
	protected $Config  =   array();
	private static $Driver =   array();    //db 查詢對象 object

	/**
	 * 禁止對象實例化
	 * @return 
	 * @param $action Object[optional]
	 */
	private function __construct($action = "default",$param='') {
		echo "嘿嘿，這是一個DB工廠兼基類，你是無法實例化的啦";
	}
	
	/**
	 * 獲取一個真實的DB操作對象
	 * @return object
	 * @param $active Object[optional]
	 */
	public static function factory($active = 'default',$param='') {
		$active	=   strtolower($active);
		$serial	=	md5($active . strtolower(serialize($param)));
		
		if(isset(self::$Driver[$serial])) {
			return self::$Driver[$serial];
		}
		//如果以前沒有加載過
		try{
			$AppUI   =   RAF_APP::getInstance();
			//讀取DB配置文件
			$configs =   $AppUI->config("Db_Config");
			if(isset($configs[$active])) {
				$config =  $configs[$active];
			}else {
				$sys_path	=   $AppUI->config("Sys_Config_Path") . DR . "Database.inc.php";
				$app_path	=	$AppUI->config("App_Config_Path") . DR . "Database.inc.php";
				
				//增加模塊配置 edit by benero 2008-7-11 22:35
				$configs	=	array();
				//系統配置
				if(file_exists($sys_path)) {
					$configs		=	array_merge($configs,load($sys_path,"DB"));;
				}
				//模塊配置
				if(file_exists($app_path) && $sys_path != $app_path) {
					$configs		=	array_merge($configs,load($app_path,"DB"));;
				}
				if(empty($configs)) {
					throw new Db_Exception($active,EXCEPTION_DB_CONFIG_NOEXIST);
				}
				if(!isset($configs[$active])) {
					throw new Db_Exception($active,EXCEPTION_DB_CONFIG_ACTIVE_NOEXIST);
				}
				$config  =   $configs[$active];
				$AppUI->config("db_config",$configs);
			}
			//動態加載 參數 for dbconn
			if(!empty($param)) {
				$config['param']	=	$param;
			}
			//當沒有設置param時，初始化KEY值 edit by benero 2008-10-29 17:33
			if(!isset($config['param'])) {
				$config['param']	=	'';
			}
			
            //讀取相應的DB驅動類型
			$type    =   ucwords_deep($config["type"]);
			$path    =   dirname(__FILE__) . DR . "Driver" . DR . $type . ".class.php";
			if(!file_exists($path)) {
				throw new Db_Exception($active,EXCEPTION_DB_CONFIG_TYPE_NOEXIST);
			}
			load($path);
            $class_name  =   "DB_" . $type;
            self::$Driver[$serial]  =   new $class_name($config);
            return self::$Driver[$serial];
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
	}
	
	/**
	 * 公共查詢接口
	 */	
	//獲取所有記錄 
    function getAll($sql) {
    	try {
	    	$tmp = strtolower($sql);
	    	
	    	//添加offset 查詢條件. by sasumi
	    	//支持原來的ＳＱＬ查詢
	    	if(!empty($this->offset) && strpos($tmp,' limit ') === false && strpos($tmp,' top ') === false){
	    		$sql = $this->selectLimit($sql);
	    	}
	    	
	    	//添加分頁條件 by sasumi
	    	//條件：per_num(每頁記錄數量)不為空，查詢語句里面沒有limit, top 詞語
	    	else if(!empty($this->per_num) && strpos($tmp,' limit ') === false && strpos($tmp,' top ') === false) {
	    		try {
		    		$this->clear = 0;
		    		$sum = $this->getCount($sql);				//獲取記錄總數
		    		$this->getPageInfo($sum);					//設置分頁信息
		    		$sql = $this->selectLimit($sql);			//對原來的ＳＱＬ語句添加LIMIT(OFFSET)
		    		$this->clear = 1;
	    		}catch(RAF_EXCEPTION $e) {
	    			$e->handleEx(array('title'=>'DB Get Page Error'));
	    		}
	    	}
	    	
	    	//如果$sql已不是返回語句，則直接返回;兼容Mssql無主鍵，按data seek分頁
	    	if(!is_string($sql)) {
				if($this->clear) {
					$this->clear();
				}
	    		return $sql;
	    	}
			
	        $query    =   $this->query($sql);
	        $rs       =   array();
	        while($this->next_record()) array_push($rs,$this->Record);
	        return $rs;
    	}catch(RAF_EXCEPTION $e) {
    		$e->handleEx();
    	}
    }
    
    
    //設置分頁
    function setPage($page_size,$config=array()) {
    	$this->per_num	=	$page_size;
    	$this->page_config = $config;
    }
    
    //獲取分頁相關信息
    function getPageInfo($sum) {
    	try {
	    	load_class("RAF_Pager",false);
	    	$pager = new RAF_Pager($this->per_num, $sum, $this->page_access);	//初始化分頁
	    	$this->page_info = $pager->getInfo();						//獲取分頁信息
	    	$this->page_html = $pager->getHtml($this->page_mode,$this->page_config);	//獲取分頁HTML
	    	$this->offset = $pager->getOffset();						//獲取分頁OFFSET
    	}catch(RAF_EXCEPTION $e) {
    		$e->handleEx(array('module'=>'getPageInfo'));
    	}
    }
    
    //获取记录总数
    //將原來的ＳＥＬＥＣＴ語句進行轉換成 SELECT COUNT(*)模式
    function getCount($sql=''){
    	try {
	    	if(empty($sql)){
	    		return $this->num_rows();
	    	}

	    	$lower_sql = ' '.strtolower($sql);
	    	if(strpos($lower_sql,' select ') === false){
	    		return 0;
	    	}

			//非 GROUP BY 模式  需要找出order前的語句
			if(strpos($lower_sql, ' group by ') === false){
				$from_pos = strpos($lower_sql,' from ') + strlen(' from ') - 1;
                //找出order by 的語句 by benero 2009-12-01
                $pattern = "/.+(\ order[ ]+by\ ).+/";
                $is_orderby = preg_match($pattern,$lower_sql,$data);
                if(!empty($is_orderby)) {
                    $offset = strpos($lower_sql,$data[1]) - $from_pos;
                    $sql = 'SELECT COUNT(*) AS num_sum FROM '.substr($sql, $from_pos,$offset);
                }else {
                    $sql = 'SELECT COUNT(*) AS num_sum FROM '.substr($sql, $from_pos);
                }
		        $query    =   $this->query($sql);
		        $this->next_record();
		        return $this->Record['num_sum'];
			}
			//GROUP BY 模式
			else {
				$result = $this->query($sql);
				$count = $this->num_rows();
	        	$this->Record = null;
	        	return $count;
			}
    	}catch(RAF_EXCEPTION $e) {
    		$e->handleEx(array('moudle'=>'getCount'));
    	}
    }
    
    //獲取一個字段
    function getField($sql,$field) {
    	try {
	        $query    =   $this->query($sql);
	        $this->next_record();
			if(!empty($this->Record) && is_array($this->Record)) {
				return array_key_exists($field,$this->Record) ? $this->Record[$field] : false;
			}else {
				return false;
			}
    	}catch(RAF_EXCEPTION $e) {
    		$e->handleEx(array('moudle'=>'getField'));
    	}
    }
    
	//獲取一條記錄
    function getOne($sql) {
        try{
	        $query    =   $this->query($sql);
	        $this->next_record();
	        return $this->Record;
        }
        catch(RAF_EXCEPTION $e) {
            $e->handleEx(array('moudle'=>'getOne'));
        }
    }
	
	/**
	 * 獲取一個字段
	 * @return string
	 */
    function getOneField($table="",$field = "",$where='') {
        try{
            if(!empty($table)) $this->table   =   $table;
            if(!empty($where)) $this->where   =   $where;
            
            !empty($field) ? $this->field=$field : $field=$this->field;
            $sql    =   $this->genSelectSql(); 
	        $query    =   $this->query($sql);
	        $this->next_record();
	        return !empty($this->Record) && array_key_exists($field,$this->Record) ? $this->Record[$field] : false;
        }
        catch(RAF_EXCEPTION $e) {
            $e->handleEx();
        }
    }
	
	
    /**
     * 獲取滿足條件的的一條記錄
     * @param string $table table list
     * @param string $where 條件
     * @param string $order 排序
     * @return array 一維結果
     */
    function getOneRow($table="",$where='',$order='') {
        try{
            if(!empty($table)) $this->table   =   $table;
            if(!empty($where)) $this->where   =   $where;
            if(!empty($order)) $this->order   =   $order;
            $sql    =   $this->genSelectSql();
	        $query    =   $this->query($sql);
	        $this->next_record();
	        return $this->Record;
        }
        catch(RAF_EXCEPTION $e) {
            $e->handleEx();
        }
    }
    
    /**
     * 獲取滿足條件的的全部記錄
     * @param string $table table list
     * @param string $where 條件
     * @param string $order 排序
     * @return array 二維結果
     */
    function getAllRow($table="",$where='',$order='') {
    	try{
    		if(!empty($table)) $this->table   =   $table;
    		if(!empty($where)) $this->where   =   $where;
    		if(!empty($order)) $this->order   =   $order;

			if(empty($this->where)) {
				$this->where = ' 1=1 ';
			}
    		//是否存在分頁信息
    		if(!empty($this->per_num)) {
				//計算總條數
				$this->clear = 0;
				if(empty($this->group)) {
					$sql = "SELECT count(*) as total FROM $this->table WHERE {$this->where}";
					$sum = $this->getField($sql,'total');
				} else {
					$sql = "SELECT 1 FROM $this->table WHERE {$this->where} GROUP BY {$this->group}";
					$this->query($sql);
					$sum = $this->num_rows();
				}
				$this->clear = 1;
    			$this->getPageInfo($sum);
    		}
			$sql    =   $this->genSelectSql();	
			//如果$sql已不是返回語句，則直接返回;兼容Mssql無主鍵，按data seek分頁
			if(!is_string($sql)) {
				if($this->clear) {
					$this->clear();
				}
				return $sql;
			}
			$query    =   $this->query($sql);
	        $rs       =   array();
	        while($this->next_record()) array_push($rs,$this->Record);
	        return $rs;
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
    }
	
	//新增一條記錄
	function insert($table,$data) {
    	try{
	        if (empty($table) || empty($data) || !is_array($data)) {
	            return false;
	        }
	        $keyList    =   array();
	        $valueList  =   array();
	        foreach ($data as $key=>$value) {
	            $keyList[]      =   $key;
	            $valueList[]    =   "'" . $value . "'";
	        }
	        $sql    =   "INSERT INTO $table (" . implode(",",$keyList) . ") VALUES (" . implode(",",$valueList) . ")";
	        $query =   $this->query($sql);
			return $this->affected_rows();
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
	}
	
	//更新一條記錄
	function update($table,$data,$where) {
    	try{
	        if (empty($table) || empty($data) || !is_array($data) || empty($where)) {
	            return false;
	        }
	        $item   =   array();
	        foreach ($data as $key=>$val) {
	            $item[] =   $key . "='" . $val . "'";
	        }
	        $sql    =   "UPDATE $table SET " . implode(",",$item) . " WHERE $where";
	        $query	=	$this->query($sql);
	        return $query;
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
	}
	
	//刪除一條記錄
	function delete($table,$where) {
    	try{
	        if (empty($table) || empty($where)) {
	            return false;
	        }
	        $sql    =   "DELETE FROM $table where $where";
	        $result =   $this->query($sql);
	        return $this->affected_rows();
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
	}
	
	
    /* public: some trivial reporting */
    function link_id() {
       return $this->Link_ID;
    }
    
    function query_id() {
       return $this->Query_ID;
    }
	
    /**
     * 清除查詢對象
     * @return 
     */
    function clear() {
        $this->type   =   null;
        $this->table  =   null;
        $this->field  =   null;
        $this->where  =   null;
        $this->order  =   null;
        $this->group  =   null;
        $this->offset =   null;
        $this->pk     =   null;
        $this->per_num = null;
        $this->page_info = null;
    }

	/**
	 * 獲得查詢的SQL
	 * @return 
	 */
	function prepare($type = "select") {
		$type =   strtolower($type);
		switch($type) {
			case "select":
			    $sql =   $this->genSelectSql();
				break;
		}
		
		$this->sql = $sql;
		return $sql;
	}
	
    /**
     * 根據DB對象生成標準SQL語句
     * @return string
     */
    function genSelectSql() {
    	try {
	        $sql    =   array("SELECT");
	        //字段
	        if (!empty($this->field))    $sql[]  =   $this->field;
	            else $sql[] =   "*";
	        //table
	        if (!empty($this->table)) {
	        	$sql[]  =   "FROM " . $this->table;
	        }else {
	        	throw new Db_Exception("table no exist",DB_MISS_TABLE);
	        }
	        //where
	        if (!empty($this->where))    $sql[]  =   "WHERE "  . $this->where;
			
	        //group
	        if (!empty($this->group))    $sql[]  =   " GROUP BY  "  . $this->group;
			
	        //order
	        if (!empty($this->order))    $sql[]  =   "  ORDER BY "  . $this->order;
	        
	        $sql    =   implode(" ",$sql);
	        
	        //offset
	        if (!empty($this->offset)) {
	            $sql    =   $this->selectLimit($sql);
	        }
	        return $sql;
		}catch(RAF_EXCEPTION $e) {
			$e->handleEx();
		}
    }
}

?>
