<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	微博展示管理
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" /></head>
<body>
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>  
    <table border="0" cellspacing="0" cellpadding="0" width="100%">    
        <tr>
            <td background="<?=$GLOBALS['admin_root']?>images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title">微博编辑 </span></td>
                    </tr>
                </table>              
            </td>
        </tr>
        <tr>
		<td >
		<form action="<?=$GLOBALS['admin_root']?>index.php?action=miniweibo" method="get"  target="rightframe">
        <input type="hidden" name="action" value="miniweibo" />
        <input type="hidden" name="method" value="actget" />
        <input type="hidden" name="act" value="<?php echo $found ? 'edit' : 'add'?>" />
        <?php if($found){ ?>
            <input type="hidden" name="id" value="<?=$wbinfo['id'] ?>" />
        <?php }else{?>
            <input type="hidden" name="type" value="<?=$type ?>" />
        <?php }?>
		    <table border="0" width="95%" align="center">
		        <tr>
		         <td>昵称:</td><td><input type="text" name="name" value="<?php echo  $found ? cstr($wbinfo['name']) : '' ; ?>" /></td>
		        </tr>
		        <tr>
		         <td>微博ID:</td><td><input type="text" name="uid" value="<?php echo  $found ? $wbinfo['uid'] : '' ;?>" /></td>
		        </tr>    	        
			    <tr>
			        <td colspan="2" align="center" style="height: 41px">
			            <input type="submit" name="" value="保存"  class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />                      
			        </td>
			    </tr>
			</table>
		  </form>	
		</td>
        </tr>
    </table>
 
</body>
</html>