<?php
class Access {
	public	function checkLogin(){
		if (empty($_SESSION['username'])){
			return false;
		}
		$db	=	DB::factory();
		$accessid	=	$db->getOneField("chn_users","role","user_name = '".$_SESSION['username']."' AND state = 1");
		$data	=	array(
			'username'	=>	$_SESSION['username'],
			'accessid'	=>	$accessid,
		);
		return $data;
	}
}
?>