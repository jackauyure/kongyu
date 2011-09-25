<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title></title>
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
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title">图片管理</span></td>

                    </tr>
                </table>
                
            </td>
        </tr>
        <tr>
            <td >
                
<table border="0" width="95%" align="center">
    <tr>
        <td>&nbsp;</td>
    </tr> 
    
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>    
            <div>
	<table class="DataWebControlStyle" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_GridView1" style="width:100%;border-collapse:collapse;">
		<thead>
		<tr class="HeaderStyle">
			<th scope="col"><?=$msg['name']?></th>
			<th scope="col"><?=$msg['isshow']?></th>
			<th scope="col">语言</th>
			<th scope="col"><?=$msg['update']?></th>
		</tr>
		</thead>
		<tbody>
		<?php 
		if (!empty($catinfo)) foreach($catinfo as $w){
			?>
			<tr class="RowStyle">				
	            <td align="center"><?=$w['category_name']?></td>
	            <td align="center"><?=($w['show_flag']=='1'?$msg['yes']:$msg['no'])?></td>
	            <td align="center"><?=($w['lan_type']=='1')?'中文':'英文'?></td>
	            <td align="center">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=category&method=edit&id=<?=$w['category_id'] ?>"><?=$msg['edit']?></a>
	            	|
	            	<a onclick="return confirm('<?=$msg['delsure']?>');" class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=category&method=del&id=<?=$w['category_id'] ?>"><?=$msg['del']?></a>
	            </td>
			</tr>
	    <?php }?>	
		</tbody>
	</table>
</div>
            <table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>             
              <td align="right" style="padding-top:5px;"></td>
            </tr>
          </table>
         </td>
    </tr>
    
    <tr>
        <td align="center" style="height: 41px">
            <input onclick="self.location.href='<?=$GLOBALS['admin_root']?>index.php?action=category&method=add&catetype=<?=$this->catetype ?>'" type="submit" name="ctl00$ContentPlaceHolder1$btnAdd" value="<?=$msg['add']?> " class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />                   
        </td>
     
    </tr>
    
</table>

</td>
</tr>
</table>
</body>
</html>