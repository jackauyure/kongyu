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
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title">微博展示分类 </span></td>

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
        <td style="border:#ADC5DD 1px solid;background:#fff;">
        	<form action="<?=$GLOBALS['admin_root']?>index.php?action=miniweibo" method="get"  target="rightframe">
        	<input type="hidden" name="action" value="miniweibo" />
            <table border="0" width="95%" align="center">
                <tr>       
                    <td class="tdTitle" align="right" style="height:40px;"><span>微博展示分类:</span></td>
                    <td>
                        <select name="type" onchange="javascript:this.form.submit();">							
							<option <?=$type==1 ? 'selected="selected"' : ''?> value="1">明星船员</option>	
							<option <?=$type==2 ? 'selected="selected"' : ''?> value="2">微博达人</option>	
							<option <?=$type==3 ? 'selected="selected"' : ''?> value="3">微博号拉拉队</option>	
							<option <?=$type==4 ? 'selected="selected"' : ''?> value="4">其它官方微博</option>					
						</select>                              
                    </td>                 
                </tr>
            </table>
            </form>
        </td>
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
			<th scope="col">昵称</th>
			<th scope="col">微博ID</th>
			<th scope="col">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($wbinfo as $w){?>
			<tr class="RowStyle">				
	            <td align="center"><?=cstr($w['name'])?></td>
	            <td align="center"><?=$w['uid']?></td>
	            <td align="center">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=miniweibo&method=edit&id=<?=$w['id'] ?>">编辑</a>
	            	|
	            	<a onclick="return confirm('确定要删除?');" class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=miniweibo&method=del&id=<?=$w['id'] ?>">删除</a>
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
            <input onclick="self.location.href='<?=$GLOBALS['admin_root']?>index.php?action=miniweibo&method=add&type=<?=$type ?>'" type="submit" name="ctl00$ContentPlaceHolder1$btnAdd" value=" 添 加 " class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />                   
        </td>
    </tr>
</table>

</td>
</tr>
</table>
</body>
</html>