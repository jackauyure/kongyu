<?php
/***
 * RAF Moudle
 */


abstract class RAF_Module extends RAF_Request {
	public $tableName;
	public $primaryKey;
	
	
	function connect($dbCfg) {
		
	}
	
	
	function getOneRow() {
		__THROW(new Db_Exception("sql error",1));
		
		return array(
		  "id"    =>   1,
		  "name"  =>  "benero",
		  "mail"  =>  "benero@runup.com.hk"
		);
	}
}

?>