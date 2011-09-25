<?php
/***
 * Mysql DB連接類
 * 1、調用：DB::factory()，不用通過其它方式調用
 * 2、操作方法：
 *  - connect()：連接DB
 *  - query()：執行查詢語句
 */

class DB_Mysql extends DB {
	
	/**
	 * 構造函數：初始化連接
	 * @return 
	 * @param $config Object
	 */
	function __construct($config='') {
		if(!empty($config)){
			$this->Config =   $config;
			$this->connect();
		}
	}

	/**
	 * 連接DB
	 * @return 
	 */
	function connect() {
		if(0 == $this->Link_ID) {
		    if(!$this->PConnect) {
			    $this->Link_ID = @mysql_connect($this->Config["host"], $this->Config["user"], $this->Config["password"]);
			} else {
			    $this->Link_ID = @mysql_pconnect($this->Config["host"], $this->Config["user"], $this->Config["password"]); 
			}
			if(!$this->Link_ID) {
				throw new Db_Exception("connect {$this->Config['database']} failed with ({$this->Config['user']}@{$this->Config['host']})",EXCEPTION_DB_CONNECT_FAILE,mysql_error());
			}
		}
		//解決dbconn連接時，無法明確知道database名稱的BUG
		if(!empty($this->Config["database"]) && !@mysql_select_db($this->Config["database"],$this->Link_ID)) {
			throw new Db_Exception("cannot select {$this->Config['database']} by ({$this->Config['user']}@{$this->Config['host']})",EXCEPTION_DB_SELECT,mysql_error());
		    return 0;
		}
        if(isset($this->Config["charset"])) {
        	$charset   =   $this->Config["charset"];
            mysql_query("set NAMES '$charset'",$this->Link_ID);
        }
		return $this->Link_ID;
	}
	
	/* public: discard the query result */
	function free() {
	  @mysql_free_result($this->Query_ID);
	  $this->Query_ID = 0;
	}
	
	/* public: perform a query */
	function query($Query_String) {
		/* No empty queries, please, since PHP4 chokes on them. */
		if ($Query_String == "") return 0;

		/* we already complained in connect() about that. */
		if (!$this->connect()) return 0; 

		# New query, discard previous result.
		if ($this->Query_ID) {
			$this->free();
		}

		$this->Query_ID = @mysql_query($Query_String,$this->Link_ID);
		$this->Row   = 0;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		if (false === $this->Query_ID) {
			throw new Db_Exception($Query_String,EXCEPTION_DB_QUERY_ERROR,mysql_error());
		}
		if ($this->debug) {
			echo "SQL:" . $Query_String . "<br />"; 
		}
		if($this->clear) {
			$this->clear();
		}
		# Will return nada if it fails. That's fine.
		return $this->Query_ID;
	}
	
	
	/**
	 * 輔助函數
	 */

	
	/* public: walk result set */
	function next_record() {
		if (!$this->Query_ID) {
		  $this->halt("next_record called with no query pending.");
		  return 0;
		}
		
		$this->Record = @mysql_fetch_assoc($this->Query_ID);
		$this->Row   += 1;
		
		$stat = is_array($this->Record);
		if (!$stat) {
		  $this->free();
		}
		return $stat;
	}

	/* public: position in result set */
	function seek($pos = 0) {
		$status = @mysql_data_seek($this->Query_ID, $pos);
		if ($status)
		  $this->Row = $pos;
		else {
		  $this->halt("seek($pos) failed: result has ".$this->num_rows()." rows.");
		
		  /* half assed attempt to save the day, 
		   * but do not consider this documented or even
		   * desireable behaviour.
		   */
		  @mysql_data_seek($this->Query_ID, $this->num_rows());
		  $this->Row = $this->num_rows();
		  return 0;
		}
		return 1;
	}
	
	/* public: evaluate the result (size, width) */
	function affected_rows() {
	   return @mysql_affected_rows($this->Link_ID);
	}
	
	function num_rows() {
	   return @mysql_num_rows($this->Query_ID);
	}
	
	function num_fields() {
	   return @mysql_num_fields($this->Query_ID);
	}
	
	function insert_id() {
		return mysql_insert_id($this->Link_ID);
	}	
  
    /* private: error handling */
    function halt($msg,$exception_type = EXCEPTION_DB_OTHER_ERROR) {
		$this->Error = @mysql_error($this->Link_ID);
		$this->Errno = @mysql_errno($this->Link_ID);
        $msg = sprintf("<p><b>Database error:</b> %s<br>\n", $msg);
		$msg .= sprintf("<b>MySQL Error</b>: %s (%s)</p>\n",$this->Errno,$this->Error);
		throw new Db_Exception($msg,$exception_type);
    }
	
	/**
	 * SQL語句分析
	 */
    function selectLimit($sql) {
    	if(strpos($this->offset,",")) {
    		list($begin,$offset)    =   split(",",$this->offset);
    	}else {
    		$begin   =   0;
			$offset  =   $this->offset;
    	}
        
        $begin      =   intval($begin);
        $offset     =   intval($offset);
		
        if (empty($offset)) {
            $sql    .=  " Limit " . $begin;
        }else {
            $sql    .=  " Limit " . $begin . "," . $offset;
        }
        return $sql;
    }

}
?>
