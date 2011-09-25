
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head><title>
	无标题页
</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="<?=$GLOBALS['admin_root']?>css/StyleSheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$GLOBALS['style']?>js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?=$GLOBALS['admin_root']?>js/manage.js"></script>
</head>
<body>
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td background="<?=$GLOBALS['admin_root']?>images/righttitle_bg.gif" style="height:35px;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="width:50px;" align="center"><img src="images/icon4.png"/></td>
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title"><?=$msg['newslist']?></span></td>

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
        	<form action="<?=$GLOBALS['admin_root']?>index.php?action=video" method="get" name="sreach" target="rightframe">
        	<input type="hidden" name="action" value="video" />
            <table border="0" width="95%" align="center">
                <tr>       
                    <td class="tdTitle" nowrap align="right" style="height:40px;">
                        <span id="ctl00_ContentPlaceHolder1_Label1"><?=$msg['name']?>:</span>
                    </td>                   
                    <td class="tdTitle" nowrap align="right" style="height:40px;"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['newstype']?>:</span></td>
                    <td>
                        <select name="category_id" id="category_id" onchange="javascript:this.form.submit();">
							<option value="">-- <?=$msg['checktype']?>--</option>
							<?php 
							if (!empty($categorylist)) foreach ($categorylist as $key=>$val){
								$select	=	is_selected($key,$sccategory);
								echo "<option value='$key' $select>$val</option>";
							}
							?>
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

<form action="<?=$GLOBALS['admin_root']?>index.php?action=video&method=del" method="post" name="delit" target="rightframe">  
<input type="hidden" name="action" value="news" />
            <div>
 	<table class="DataWebControlStyle" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_GridView1" style="width:100%;border-collapse:collapse;">
		<thead>
		<tr class="HeaderStyle">
			<th scope="col">&nbsp;</th>
			<th scope="col"><?=$msg['title']?></th>
			<th scope="col">是否首页</th>
			<th scope="col"><?=$msg['newstype']?></th>
			<th scope="col"><?=$msg['isshow']?></th>
			<th scope="col"><?=$msg['upadmin']?></th>
			<th scope="col"><?=$msg['update']?></th>
			<th scope="col">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		if (!empty($videolist)) foreach ($videolist as $v){
		?>
			<tr class="RowStyle">
				<td align="center" style="width:30px;">
	               <input class="newsid" type="checkbox" name="video_id[]" value='<?=$v['video_id']?>'/>
	            </td>
	            <td align="center"><?=cstr($v['title'])?></td>
	            <td align="center"><?=$v['isindex']==1 ? '<span style="color:red;">是</span>' : '否'?></td>
	            <td align="center"><?=isset($categorylist[$v['category_id']])?$categorylist[$v['category_id']]:$msg['null']?></td>
	            <td align="center"><?=($v['show_flag']=='1')?$msg['yes']:$msg['no']?></td>
	            <td align="center"><?=isset($adminlist[$v['update_user_id']])?$adminlist[$v['update_user_id']]:$msg['null']?></td>
	            <td align="center"><?=toDate($v['update_date'])?></td>
	            <td align="center">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=video&method=edit&id=<?=$v['video_id']?>"><?=$msg['edit']?></a>
	            	|
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=video&method=del&id=<?=$v['video_id']?>" onclick="return confirm('<?=$msg['delsure']?>');"><?=$msg['del']?></a>
	            </td>
			</tr>
		<?php 	
		}
		?>
		</tbody>
	</table>
</div>
<table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left"><input type="checkbox" name="checkall" value="newsid" id="checkall"><?=$msg['checkall']?></td>
              <td align="right" style="padding-top:5px;"><?=$pagehtml?></td>
    </tr>
    <table cellspacing="0" rules="all" border="0" style="width:100%;border-collapse:collapse;">
    <tr>
        <td align="center" style="height: 41px">
            <input type="button" value="<?=$msg['add']?>" id="ctl00_ContentPlaceHolder1_btnAdd" onclick="self.location.href='<?=$GLOBALS['admin_root']?>index.php?action=video&method=add'" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />
            <input type="submit" name="submit" value="<?=$msg['del']?>" onclick="return confirm('<?=$msg['delsure']?>');" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />
        </td>
    </tr>
    
</table>
</form>
         </td>
    </tr>
</table>

            </td>
        </tr>
    </table>
</body>
</html>