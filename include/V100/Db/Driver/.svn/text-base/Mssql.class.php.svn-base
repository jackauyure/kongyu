<?php
/*
 * Session Management for PHP3
 *
 * (C) Copyright 1998 Cameron Taggart (cameront@wolfenet.com)
 *        Modified by Guarneri carmelo (carmelo@melting-soft.com)
 *	  Modified by Cameron Just     (C.Just@its.uq.edu.au)	 
 *
 * $Id: db_mssql.inc,v 1.6 2004/07/23 20:36:29 layne_weathers Exp $
 */ 
# echo "<BR>This is using the MSSQL class<BR>";

class DB_Mssql extends DB { 
  
    /**
     * 構造函數：初始化連接
     * @return 
     * @param $config Object
     */
    function __construct($config = '') {
    	if(!empty($config)){
        	$this->Config =   $config;
        	$this->connect();
    	}
    }

	function connect() {
        if(0 == $this->Link_ID) {
            if(!$this->PConnect) {
                $this->Link_ID = @mssql_connect($this->Config["host"], $this->Config["user"], $this->Config["password"]);
            } else {
                $this->Link_ID = @mssql_pconnect($this->Config["host"], $this->Config["user"], $this->Config["password"]); 
            }
            if(!$this->Link_ID) {
				throw new Db_Exception("connect {$this->Config['database']} failed with ({$this->Config['user']}@{$this->Config['host']})",EXCEPTION_DB_CONNECT_FAILE);
                return 0;
            }
        }
        if(!empty($this->Config["database"]) && !@mssql_select_db($this->Config["database"],$this->Link_ID)) {
			throw new Db_Exception("cannot select {$this->Config['database']} by ({$this->Config['user']}@{$this->Config['host']})",EXCEPTION_DB_SELECT);
		    return 0;
        }
        return $this->Link_ID;
	}
	
	
	function connect_failed($message) {
		$this->Halt_On_Error = "yes";
		$this->halt($message);
	}
	
	function free_result(){
	   mssql_free_result($this->Query_ID);
	   $this->Query_ID = 0;
	}
	
	function query($Query_String) 
	{
		/* No empty queries, please, since PHP4 chokes on them. */
		if ($Query_String == "") return 0;
		
		if (!$this->connect()) return 0; 
		
		if (!$this->Link_ID) return 0;
		
		#   printf("<br>Debug: query = %s<br>\n", $Query_String);
		
		$this->Query_ID = mssql_query($Query_String, $this->Link_ID);
		$this->Row = 0;
		if ($this->debug) {
		  echo "SQL:" . $Query_String . "<br />"; 
		}
		if($this->clear) {
			$this->clear();
		}
		if (!$this->Query_ID) {
			return false;
		}
		return $this->Query_ID;
	}
	
	function next_record() {
		if (!$this->Query_ID) {
		  $this->halt("next_record called with no query pending.");
		  return 0;
		}
		
		$this->Record = mssql_fetch_assoc($this->Query_ID);
		$this->Row   += 1;
		
		$stat = is_array($this->Record);
		if (!$stat) {
		  $this->free_result();
		}
		return $stat;
	}
	
	function seek($pos) {
		if ($this->num_rows() > 0){
			@mssql_data_seek($this->Query_ID,$pos);
			$this->Row = $pos;
		}
		else{
			return false;
		}
	}
	
	function affected_rows() {
		// Not a supported function in PHP3/4.  Chris Johnson, 16May2001.
		//    return mssql_affected_rows($this->Query_ID);
		$rsRows = mssql_query("Select @@rowcount as rows", $this->Link_ID);
		if ($rsRows) {       
		   return mssql_result($rsRows, 0, "rows");
		}
	}
	
	function num_rows() {
	   return mssql_num_rows($this->Query_ID);
	}
	
	function num_fields() {
	   return mssql_num_fields($this->Query_ID);
	}
	
	function halt($msg,$exception_type = EXCEPTION_DB_OTHER_ERROR) {
		$this->Error = @mysql_error($this->Link_ID);
		$this->Errno = @mysql_errno($this->Link_ID);
        $msg = sprintf("<p><b>Database error:</b> %s<br>\n", $msg);
		$msg .= sprintf("<b>MsSQL Error</b>: %s (%s)</p>\n",$this->Errno,$this->Error);
		throw new Db_Exception($msg,$exception_type);
	}
	
	/**
	 * SQL語句分析
	 */
    function selectLimit($sql) {
        //處理一條記錄的情況
        list($offset,$size) =   explode(",",$this->offset);
        if($offset == 0 && $size == 1) return $sql;
        if(empty($this->pk)) return $this->data_seek($sql);
        //處理多條記錄的情況
        if(empty($this->table) || empty($this->where)) {
            throw new Db_Exception("",EXCEPTION_DB_QUERY_ERROR,'Sql Analyse is not support By pk mode,when you use pk mode,You have to split the SQL by hand');
        }
        $field  =   empty($this->field) ? "*" : $this->field;
        $sql    =   "select top {$size} {$field} from $this->table ";
        $sql    .=  (!empty($this->where)) ? " where " . $this->where . " and " : " where ";
        $sql    .=  $this->pk . " not in (select top " . $offset . " {$this->pk} from  {$this->table}";
        $sql    .=  (!empty($this->where)) ? " where " . $this->where : " ";
        $sql	.=	(!empty($this->order)) ? "  ORDER BY "  . $this->order : " ";
        $sql	.=	" )";
        //group
        if (!empty($this->group))    $sql .=   " GROUP BY  "  . $this->group;
        //order
        if (!empty($this->order))    $sql .=   "  ORDER BY "  . $this->order;
        return $sql;
    }
    
    /**
     * 根據記錄集位移分頁
     */
    function data_seek($sql) {
		$this->clear = 0;
    	$this->query($sql);
		$this->clear = 1;
		if ($this->Query_ID) {
			$rs = array();  
			$index = 0;  
			if($this->per_num > 0)  $this->seek($this->offset);
			while($this->next_record()) {
				if($this->per_num > 0) {
					if($index++ > ($this->per_num-1))  break;
				}
				array_push($rs,$this->Record);
			}
			return  $rs;
		}else {
			return  false;
		}
    }
}
?>
