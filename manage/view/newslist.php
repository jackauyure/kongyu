
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
                        <td style="height:35px;">&nbsp;<span id="ctl00_lblTitle" class="Title"><?=$msg['news'.$this->catetype]?></span></td>

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
        	<form action="<?=$GLOBALS['admin_root']?>index.php" method="get" name="sreach" target="rightframe">
        	<input type="hidden" name="catetype" value="<?=$this->catetype?>"/>
        	<input type="hidden" name="action" value="news" />
            <table border="0" width="95%" align="center">
                <tr>       
                    <td class="tdTitle" nowrap align="right" style="height:40px;">
                        <span id="ctl00_ContentPlaceHolder1_Label1">语言:</span></td>
                    <td>
					<td>
                        <select name="lan_type" id="lan_type">
							<option value="">--<?=$msg['all']?>--</option>
							<option value="1" <?php echo is_selected($lan_type,1);?>>中文</option>
							<option value="2" <?php echo is_selected($lan_type,2);?>>英文</option>
						</select>                         
                    </td>
                    <td class="tdTitle" nowrap align="right" style="height:40px;"><span id="ctl00_ContentPlaceHolder1_Label2"><?=$msg['newstype']?>:</span></td>
                    <td>
                        <select name="category_id" id="category_id">
							<option value="">-- <?=$msg['checktype']?>--</option>
							<?php 
							if (!empty($categorylist)) foreach ($categorylist as $key=>$val){
								$select	=	is_selected($key,$sccategory);
								echo "<option value='$key' $select>$val</option>";
							}
							?>
						</select>       
                         
                    </td>

                    <td>
                        <input type="submit" name="submit" value="<?=$msg['search']?> " class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" />
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

<form action="<?=$GLOBALS['admin_root']?>index.php?action=news&method=del" method="post" name="delit" target="rightframe">  
<input type="hidden" name="action" value="news" />
            <div>
 	<table class="DataWebControlStyle" cellspacing="0" rules="all" border="1" id="ctl00_ContentPlaceHolder1_GridView1" style="width:100%;border-collapse:collapse;">
		<thead>
		<tr class="HeaderStyle">
			<th scope="col">&nbsp;</th>
			<th scope="col">图片</th>
			<th scope="col">语言</th>
			<th scope="col"><?=$msg['newstype']?></th>
			<th scope="col"><?=$msg['isshow']?></th>
			<th scope="col">&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		if (!empty($newslist)) foreach ($newslist as $news){
		?>
			<tr class="RowStyle">
				<td align="center" style="width:30px;">
	               <input class="newsid" type="checkbox" name="id[]" value='<?=$news['news_id']?>'/>
	            </td>
	            <td align="left">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=news&method=edit&id=<?=$news['news_id']?>&catetype=<?=$this->catetype?>">
					<img src="<?=$GLOBALS['upimages'].'s_'.$news["team_img"]?>" width="100"></a>
	            </td>
	            <td align="center"><?=($news['lan_type']=='1')?'中文':'英文'?></td>
	            <td align="center"><?=isset($categorylist[$news['category_id']])?$categorylist[$news['category_id']]:$msg['null']?></td>
	            <td align="center"><?=($news['show_flag']=='1')?$msg['yes']:$msg['no']?></td>
	            <td align="center">
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=news&method=edit&id=<?=$news['news_id']?>&catetype=<?=$this->catetype?>"><?=$msg['edit']?></a>
	            	|
	            	<a class="GridViewUrl" href="<?=$GLOBALS['admin_root']?>index.php?action=news&method=del&id=<?=$news['news_id']?>" onclick="return confirm('<?=$msg['delsure']?>');"><?=$msg['del']?></a>
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
            <input type="button" value="<?=$msg['add']?>" id="ctl00_ContentPlaceHolder1_btnAdd" onclick="self.location.href='<?=$GLOBALS['admin_root']?>index.php?action=news&method=add&catetype=<?=$this->catetype?>'" class="btn1_mouseout" onmouseover="this.className='btn1_mouseover'" onmouseout="this.className='btn1_mouseout'" style="width:70px;" />
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